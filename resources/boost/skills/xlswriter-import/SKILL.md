---
name: xlswriter-import
description: Generate, review, or debug XLSX import code using the native xlswriter PHP extension and Vtiful\Kernel APIs; use for uploaded spreadsheets, row streaming, validation, data mapping, skip flags, nextRow, nextCellCallback, and database persistence.
---

# xlswriter Import

Use this skill when generating or reviewing code that reads uploaded XLSX files with `Vtiful\Kernel\Excel`.

## Workflow

1. Validate the upload before opening it.
2. Move or read the file from an application-managed temporary path.
3. Instantiate `Excel` with the directory containing the file.
4. Use `openFile($fileName)->openSheet($sheetName)` and iterate with `nextRow()` for row-based imports.
5. Process each row immediately; do not accumulate the whole spreadsheet unless the file is known to be small.
6. Use a database transaction only when a row or batch performs multiple dependent writes that must succeed or fail together.
7. Record row numbers in validation errors so users can fix the spreadsheet.

## Example

```php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vtiful\Kernel\Excel;

$validated = $request->validate([
    'file' => ['required', 'file', 'mimes:xlsx'],
]);

$uploaded = $validated['file'];
$directory = dirname($uploaded->getRealPath());
$fileName = basename($uploaded->getRealPath());

$reader = (new Excel(['path' => $directory]))
    ->openFile($fileName)
    ->openSheet();

$rowNumber = 0;
$errors = [];

while ($row = $reader->nextRow()) {
    $rowNumber++;

    if ($rowNumber === 1) {
        continue;
    }

    [$sku, $name, $price] = array_pad($row, 3, null);

    if ($sku === null || $name === null) {
        $errors[] = "Row {$rowNumber}: SKU and name are required.";
        continue;
    }

    DB::table('products')->updateOrInsert(
        ['sku' => (string) $sku],
        ['name' => (string) $name, 'price' => (float) $price],
    );
}
```

## Best Practices

- Do not trust formulas, hyperlinks, or rich text from spreadsheets as safe output.
- Cast spreadsheet cell values at the boundary where the model, command, or DTO is created.
- Use `nextCellCallback()` when a file is too large for row-level processing or when per-cell streaming is a better fit.
- Use the helper constants such as `Excel::SKIP_EMPTY_ROW` only after checking the import requirements; skipping rows can hide user data mistakes.
- Keep import mapping explicit. Avoid generic column-to-model mass assignment unless the spreadsheet schema is controlled by the application.
