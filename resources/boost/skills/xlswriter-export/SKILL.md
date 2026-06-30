---
name: xlswriter-export
description: Generate, review, or debug XLSX export code using the native xlswriter PHP extension and Vtiful\Kernel APIs; use for download responses, queued exports, large constMemory exports, formatting, formulas, images, and worksheet options.
---

# xlswriter Export

Use this skill when generating or reviewing code that exports XLSX files with `Vtiful\Kernel\Excel`.

## Workflow

1. Confirm `ext-xlswriter` is installed in the runtime environment; the IDE helper package does not replace the native extension.
2. Choose an application-controlled output directory, normally `storage_path('app/exports')` in framework projects.
3. Create the directory before instantiating `Excel`.
4. Use `fileName()` for normal exports or `constMemory()` for large exports.
5. Write rows with `header()` / `data()` for simple sheets, or `insertText()` / `insertDate()` / `insertFormula()` when cell-level control is needed.
6. Call `output()` once and return the generated path through a download response.
7. Delete one-time export files after download.

## Example

```php
use Illuminate\Support\Facades\File;
use Vtiful\Kernel\Excel;

$directory = storage_path('app/exports');
File::ensureDirectoryExists($directory);

$excel = new Excel(['path' => $directory]);

$filePath = $excel
    ->fileName('orders.xlsx', 'Orders')
    ->header(['Order No', 'Customer', 'Total'])
    ->data($orders->map(fn ($order) => [
        $order->number,
        $order->customer_name,
        $order->total,
    ])->all())
    ->output();

return response()
    ->download($filePath, 'orders.xlsx', [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ])
    ->deleteFileAfterSend();
```

## Large Export Pattern

```php
use Vtiful\Kernel\Excel;

$excel = new Excel(['path' => storage_path('app/exports')]);

$excel
    ->constMemory('orders.xlsx', 'Orders')
    ->header(['Order No', 'Customer', 'Total']);

Order::query()
    ->select(['id', 'number', 'customer_name', 'total'])
    ->orderBy('id')
    ->chunkById(1000, function ($orders) use ($excel) {
        foreach ($orders as $order) {
            $excel->data([[
                $order->number,
                $order->customer_name,
                $order->total,
            ]]);
        }
    });

$filePath = $excel->output();
```

## Best Practices

- Keep export generation in an action, job, or controller method that already owns the query; do not add a broad abstraction for one export.
- For queued exports, persist only the generated path or storage disk key, not the `Excel` object.
- Call `autoSize()` before writing the cells it should size.
- Prefer numeric/date values as native values instead of pre-formatted strings unless the business requirement needs text.
- Sanitize user-controlled text that starts with formula-like characters before exporting if users will open the spreadsheet in Excel.
