<?php

namespace Vtiful\Kernel;

/**
 * Class Table
 *
 * Fluent builder for an Excel table. Pass an instance to
 * {@see Excel::addTable()} together with the table range.
 *
 * @package Vtiful\Kernel
 */
class Table
{
    // Style category
    const STYLE_TYPE_DEFAULT = 0;
    const STYLE_TYPE_LIGHT = 1;
    const STYLE_TYPE_MEDIUM = 2;
    const STYLE_TYPE_DARK = 3;

    // Total-row summary function (used as the "total_function" key in columns())
    const FUNCTION_NONE = 0;
    const FUNCTION_AVERAGE = 0;
    const FUNCTION_COUNT_NUMS = 0;
    const FUNCTION_COUNT = 0;
    const FUNCTION_MAX = 0;
    const FUNCTION_MIN = 0;
    const FUNCTION_STD_DEV = 0;
    const FUNCTION_SUM = 0;
    const FUNCTION_VAR = 0;

    /**
     * Table constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Set the table name (used for structured references).
     *
     * @param string $value
     *
     * @return $this
     */
    public function name(string $value): self
    {
        return $this;
    }

    /**
     * Disable the header row.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function noHeaderRow(bool $on = true): self
    {
        return $this;
    }

    /**
     * Disable the auto-filter on the header row.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function noAutofilter(bool $on = true): self
    {
        return $this;
    }

    /**
     * Disable banded (alternating) rows.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function noBandedRows(bool $on = true): self
    {
        return $this;
    }

    /**
     * Enable banded (alternating) columns.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function bandedColumns(bool $on = true): self
    {
        return $this;
    }

    /**
     * Highlight the first column.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function firstColumn(bool $on = true): self
    {
        return $this;
    }

    /**
     * Highlight the last column.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function lastColumn(bool $on = true): self
    {
        return $this;
    }

    /**
     * Show the total row.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function totalRow(bool $on = true): self
    {
        return $this;
    }

    /**
     * Set the table style.
     *
     * @param int $type   one of Table::STYLE_TYPE_*
     * @param int $number style variant number (1..n)
     *
     * @return $this
     */
    public function style(int $type, int $number): self
    {
        return $this;
    }

    /**
     * Set per-column metadata. Each entry is an associative array
     * with any of the following keys:
     *
     *   - header:         string column header text
     *   - formula:        string formula written down the column
     *   - total_string:   string label shown in the total row
     *   - total_function: int    one of Table::FUNCTION_*
     *   - total_value:    float  numeric total when no formula is used
     *   - header_format:  Format|resource header cell format
     *   - format:         Format|resource data cell format
     *
     * @param array $columns
     *
     * @return $this
     */
    public function columns(array $columns): self
    {
        return $this;
    }
}
