<?php

namespace Vtiful\Kernel;

/**
 * Class ConditionalFormat
 *
 * Fluent builder for Excel conditional formatting rules. Pass the result of
 * {@see ConditionalFormat::toResource()} (or the object itself) to
 * {@see Excel::conditionalFormatCell()} or {@see Excel::conditionalFormatRange()}.
 *
 * @package Vtiful\Kernel
 */
class ConditionalFormat
{
    // Conditional format types
    const TYPE_CELL = 1;
    const TYPE_TEXT = 0;
    const TYPE_TIME_PERIOD = 0;
    const TYPE_AVERAGE = 0;
    const TYPE_DUPLICATE = 0;
    const TYPE_UNIQUE = 0;
    const TYPE_TOP = 0;
    const TYPE_BOTTOM = 0;
    const TYPE_BLANKS = 0;
    const TYPE_NO_BLANKS = 0;
    const TYPE_ERRORS = 0;
    const TYPE_NO_ERRORS = 0;
    const TYPE_FORMULA = 0;
    const TYPE_2_COLOR_SCALE = 0;
    const TYPE_3_COLOR_SCALE = 0;
    const TYPE_DATA_BAR = 0;
    const TYPE_ICON_SETS = 0;

    // Cell criteria
    const CRITERIA_EQUAL_TO = 0;
    const CRITERIA_NOT_EQUAL_TO = 0;
    const CRITERIA_GREATER_THAN = 0;
    const CRITERIA_LESS_THAN = 0;
    const CRITERIA_GREATER_THAN_OR_EQUAL_TO = 0;
    const CRITERIA_LESS_THAN_OR_EQUAL_TO = 0;
    const CRITERIA_BETWEEN = 0;
    const CRITERIA_NOT_BETWEEN = 0;
    const CRITERIA_TEXT_CONTAINING = 0;
    const CRITERIA_TEXT_NOT_CONTAINING = 0;
    const CRITERIA_TEXT_BEGINS_WITH = 0;
    const CRITERIA_TEXT_ENDS_WITH = 0;
    const CRITERIA_TIME_PERIOD_YESTERDAY = 0;
    const CRITERIA_TIME_PERIOD_TODAY = 0;
    const CRITERIA_TIME_PERIOD_TOMORROW = 0;
    const CRITERIA_TIME_PERIOD_LAST_7_DAYS = 0;
    const CRITERIA_TIME_PERIOD_LAST_WEEK = 0;
    const CRITERIA_TIME_PERIOD_THIS_WEEK = 0;
    const CRITERIA_TIME_PERIOD_NEXT_WEEK = 0;
    const CRITERIA_TIME_PERIOD_LAST_MONTH = 0;
    const CRITERIA_TIME_PERIOD_THIS_MONTH = 0;
    const CRITERIA_TIME_PERIOD_NEXT_MONTH = 0;
    const CRITERIA_AVERAGE_ABOVE = 0;
    const CRITERIA_AVERAGE_BELOW = 0;
    const CRITERIA_TOP_OR_BOTTOM_PERCENT = 0;

    // Color-scale / data-bar minimum/maximum rule types
    const RULE_MINIMUM = 0;
    const RULE_NUMBER = 0;
    const RULE_PERCENT = 0;
    const RULE_PERCENTILE = 0;
    const RULE_FORMULA = 0;
    const RULE_MAXIMUM = 0;

    // Data bar direction
    const BAR_DIRECTION_CONTEXT = 0;
    const BAR_DIRECTION_LEFT_TO_RIGHT = 0;
    const BAR_DIRECTION_RIGHT_TO_LEFT = 0;

    // Data bar axis position
    const BAR_AXIS_AUTOMATIC = 0;
    const BAR_AXIS_MIDPOINT = 0;
    const BAR_AXIS_NONE = 0;

    // Icon-set styles
    const ICONS_3_ARROWS_COLORED = 0;
    const ICONS_3_ARROWS_GRAY = 0;
    const ICONS_3_FLAGS = 0;
    const ICONS_3_TRAFFIC_LIGHTS_UNRIMMED = 0;
    const ICONS_3_TRAFFIC_LIGHTS_RIMMED = 0;
    const ICONS_3_SIGNS = 0;
    const ICONS_3_SYMBOLS_CIRCLED = 0;
    const ICONS_3_SYMBOLS_UNCIRCLED = 0;
    const ICONS_4_ARROWS_COLORED = 0;
    const ICONS_4_ARROWS_GRAY = 0;
    const ICONS_4_RED_TO_BLACK = 0;
    const ICONS_4_RATINGS = 0;
    const ICONS_4_TRAFFIC_LIGHTS = 0;
    const ICONS_5_ARROWS_COLORED = 0;
    const ICONS_5_ARROWS_GRAY = 0;
    const ICONS_5_RATINGS = 0;
    const ICONS_5_QUARTERS = 0;

    /**
     * ConditionalFormat constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Set the conditional format type (one of ConditionalFormat::TYPE_*).
     *
     * @param int $type
     *
     * @return $this
     */
    public function type(int $type): self
    {
        return $this;
    }

    /**
     * Set the criteria (one of ConditionalFormat::CRITERIA_*).
     *
     * @param int $criteria
     *
     * @return $this
     */
    public function criteria(int $criteria): self
    {
        return $this;
    }

    /**
     * Set a numeric value for cell-based criteria.
     *
     * @param float $value
     *
     * @return $this
     */
    public function value(float $value): self
    {
        return $this;
    }

    /**
     * Set a string or formula value for cell-based criteria.
     *
     * @param string $value
     *
     * @return $this
     */
    public function valueString(string $value): self
    {
        return $this;
    }

    /**
     * Set the minimum numeric value for "between"/"not between" criteria
     * and for color-scale/data-bar minimums.
     *
     * @param float $value
     *
     * @return $this
     */
    public function minimum(float $value): self
    {
        return $this;
    }

    /**
     * Set the minimum value as a string/formula.
     *
     * @param string $value
     *
     * @return $this
     */
    public function minimumString(string $value): self
    {
        return $this;
    }

    /**
     * Set how the minimum value is interpreted (RULE_*).
     *
     * @param int $rule
     *
     * @return $this
     */
    public function minimumRule(int $rule): self
    {
        return $this;
    }

    /**
     * Set the color used for the minimum stop in a color scale.
     *
     * @param int $color
     *
     * @return $this
     */
    public function minimumColor(int $color): self
    {
        return $this;
    }

    /**
     * Set the middle numeric value for a 3-color scale.
     *
     * @param float $value
     *
     * @return $this
     */
    public function middle(float $value): self
    {
        return $this;
    }

    /**
     * Set the middle value as a string/formula for a 3-color scale.
     *
     * @param string $value
     *
     * @return $this
     */
    public function middleString(string $value): self
    {
        return $this;
    }

    /**
     * Set how the middle value is interpreted (RULE_*).
     *
     * @param int $rule
     *
     * @return $this
     */
    public function middleRule(int $rule): self
    {
        return $this;
    }

    /**
     * Set the color used for the middle stop in a 3-color scale.
     *
     * @param int $color
     *
     * @return $this
     */
    public function middleColor(int $color): self
    {
        return $this;
    }

    /**
     * Set the maximum numeric value.
     *
     * @param float $value
     *
     * @return $this
     */
    public function maximum(float $value): self
    {
        return $this;
    }

    /**
     * Set the maximum value as a string/formula.
     *
     * @param string $value
     *
     * @return $this
     */
    public function maximumString(string $value): self
    {
        return $this;
    }

    /**
     * Set how the maximum value is interpreted (RULE_*).
     *
     * @param int $rule
     *
     * @return $this
     */
    public function maximumRule(int $rule): self
    {
        return $this;
    }

    /**
     * Set the color used for the maximum stop in a color scale.
     *
     * @param int $color
     *
     * @return $this
     */
    public function maximumColor(int $color): self
    {
        return $this;
    }

    /**
     * Attach the cell format applied when the rule matches.
     *
     * @param Format|resource $format
     *
     * @return $this
     */
    public function format($format): self
    {
        return $this;
    }

    /**
     * Set the fill color of a data bar.
     *
     * @param int $color
     *
     * @return $this
     */
    public function barColor(int $color): self
    {
        return $this;
    }

    /**
     * Show only the data bar (hide the cell value).
     *
     * @param bool $on
     *
     * @return $this
     */
    public function barOnly(bool $on = true): self
    {
        return $this;
    }

    /**
     * Use the Excel 2010 data-bar style.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function dataBar2010(bool $on = true): self
    {
        return $this;
    }

    /**
     * Use a solid (rather than gradient) fill for the data bar.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function barSolid(bool $on = true): self
    {
        return $this;
    }

    /**
     * Color used for negative values in a data bar.
     *
     * @param int $color
     *
     * @return $this
     */
    public function barNegativeColor(int $color): self
    {
        return $this;
    }

    /**
     * Border color for the data bar.
     *
     * @param int $color
     *
     * @return $this
     */
    public function barBorderColor(int $color): self
    {
        return $this;
    }

    /**
     * Border color for negative values in the data bar.
     *
     * @param int $color
     *
     * @return $this
     */
    public function barNegativeBorderColor(int $color): self
    {
        return $this;
    }

    /**
     * Hide the data bar border.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function barNoBorder(bool $on = true): self
    {
        return $this;
    }

    /**
     * Set the data bar direction (BAR_DIRECTION_*).
     *
     * @param int $direction
     *
     * @return $this
     */
    public function barDirection(int $direction): self
    {
        return $this;
    }

    /**
     * Set the data bar axis position (BAR_AXIS_*).
     *
     * @param int $position
     *
     * @return $this
     */
    public function barAxisPosition(int $position): self
    {
        return $this;
    }

    /**
     * Color of the data bar axis.
     *
     * @param int $color
     *
     * @return $this
     */
    public function barAxisColor(int $color): self
    {
        return $this;
    }

    /**
     * Set the icon set style (ICONS_*).
     *
     * @param int $style
     *
     * @return $this
     */
    public function iconStyle(int $style): self
    {
        return $this;
    }

    /**
     * Reverse the icon order in the icon set.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function reverseIcons(bool $on = true): self
    {
        return $this;
    }

    /**
     * Show only icons (hide the cell value) for an icon-set rule.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function iconsOnly(bool $on = true): self
    {
        return $this;
    }

    /**
     * Apply the rule to an additional range, in addition to the main range.
     *
     * @param string $range
     *
     * @return $this
     */
    public function multiRange(string $range): self
    {
        return $this;
    }

    /**
     * Stop evaluating further rules on matching cells when set.
     *
     * @param bool $on
     *
     * @return $this
     */
    public function stopIfTrue(bool $on = true): self
    {
        return $this;
    }
}
