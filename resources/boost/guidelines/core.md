# xlswriter in Laravel

These guidelines apply when generating Laravel code that uses
`viest/php-ext-xlswriter-ide-helper` / the `xlswriter` PHP extension.

## Core Rules

- Treat this package as an IDE helper for the native `xlswriter` extension. Do not add application runtime logic, service providers, facades, or Laravel-specific wrappers to this package unless explicitly requested.
- Before writing Laravel code that uses `Vtiful\Kernel\Excel`, make sure the target environment installs the extension with `pecl install xlswriter`; the Composer package alone does not provide the extension.
- Store generated spreadsheets under Laravel-managed temporary paths such as `storage_path('app/exports')`; create the directory before writing and remove one-off files after sending them to the user.
- For large exports, prefer `constMemory($fileName, $sheetName)` and write rows incrementally instead of building the whole workbook in memory.
- Use `fileName($fileName, $sheetName)->header($header)->data($rows)->output()` for simple exports.
- Use explicit `insertText()`, `insertDate()`, `insertFormula()`, `setColumn()`, `freezePanes()`, `autoFilter()`, `validation()`, `addTable()`, or `insertImage*()` calls only when the spreadsheet needs those features.
- Use `openFile()`, `openSheet()`, `nextRow()`, and `nextCellCallback()` for imports. For large imports, avoid reading every row into an array before processing.
- Validate uploaded files with Laravel validation before opening them, and never trust spreadsheet formulas, URLs, or cell text as safe HTML or SQL.
- When returning downloads from Laravel, send the generated file with the correct XLSX content type and disposition, and prefer framework helpers that can delete the file after the response.

## API Notes

- The main namespace is `Vtiful\Kernel`.
- `Excel::__construct()` requires an array config. In Laravel examples, pass at least `['path' => storage_path('app/exports')]`.
- `output()` returns the generated file path.
- Format, validation, chart, table, rich string, and conditional-format helpers are fluent builders whose `toResource()` values can be passed into `Excel` methods.
- Do not invent APIs from PhpSpreadsheet, Laravel Excel, or Symfony Spreadsheet. Check the helper stubs and the xlswriter docs first.
