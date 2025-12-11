# Testing Checklist

This checklist should be completed after each commit or fix to ensure all functionality works correctly.

## Version Compatibility

- [x] Sticky headers work in Filament v3
- [x] Sticky headers work in Filament v4

## Theme Support

- [x] Sticky headers work in light theme
- [x] Sticky headers work in dark theme

## Responsive Design

- [x] Sticky headers work in large screen sizes (desktop)
- [x] Sticky headers work in mobile screens

## UI Element Interactions

- [x] Table headers remain above `Edit` and `Delete` buttons when scrolling
- [x] Table headers are behind the filter dropdown (correct z-index)
- [x] no gap when use `ColumnGroup` that contains `->columns([ ... ])`
