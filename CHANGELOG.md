# Changelog

All notable changes to the Qalamik WordPress theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2026-01-03

### Added
- Modern WordPress 6.x compatibility
- Proper theme setup function with `after_setup_theme` hook
- Theme support for `title-tag`
- Theme support for `html5` markup
- Theme support for `custom-logo`
- Theme support for `custom-header`
- Theme support for `custom-background`
- Theme support for Block Editor styles (`wp-block-styles`, `editor-styles`, `responsive-embeds`, `align-wide`)
- Proper script and style enqueuing with `wp_enqueue_scripts` hook
- Modern widget registration with descriptive areas
- Translation support with proper text domain `qalamik`
- README.md for GitHub
- readme.txt for WordPress.org compatibility
- CHANGELOG.md for version tracking
- Security enhancements with proper escaping and sanitization

### Changed
- Updated deprecated `get_settings()` to `home_url()` and `get_option()`
- Updated deprecated `wp_list_cats()` to `wp_list_categories()`
- Updated deprecated `attribute_escape()` to `esc_attr()`
- Modernized `register_sidebars()` to use proper `register_sidebar()` with descriptive parameters
- Converted old-style function parameters to array-based parameters
- Improved database queries with prepared statements
- Enhanced security with `esc_url()`, `esc_html()`, `esc_attr()`, and `wp_kses_post()`
- Updated theme metadata in style.css header
- Improved code organization and commenting
- Better PHP coding standards compliance

### Fixed
- PHP 7.4+ compatibility issues
- WordPress 6.x deprecated function warnings
- Direct file access vulnerabilities
- SQL injection vulnerabilities in comments function
- XSS vulnerabilities with unescaped output
- Missing content width definition
- Improper widget registration

### Removed
- Deprecated `register_sidebars()` usage
- Old security vulnerabilities
- Commented-out dead code

### Security
- Added `ABSPATH` check to prevent direct file access
- Implemented proper escaping for all output
- Used prepared statements for database queries
- Sanitized and validated all user inputs
- Added nonces for form submissions (where applicable)

## [1.1.0] - 2012-XX-XX

### Added
- Initial public release
- RTL (Right-to-Left) support for Urdu/Arabic
- Nastaleeq typography
- Urdu OpenPad keyboard integration
- Three-column layout
- Two widget areas
- Custom recent comments function
- Social media sharing buttons
- Post thumbnails support
- Threaded comments
- Search functionality
- Archive templates

### Features
- Beautiful Urdu/Arabic typography
- Custom color scheme (purple/gray)
- Fixed-width layout (983px)
- Top navigation bar
- Custom header image
- Calendar widget
- Categories and archives widgets
- Recent posts display

---

## Version History

- **2.0.0** - January 3, 2026 - Complete modernization and WordPress compatibility update
- **1.1.0** - 2012 - Original release by M Bilal M

## Upgrade Notes

### Upgrading from 1.x to 2.0

**Important:** This is a major update that includes breaking changes and improvements.

#### Before Upgrading:
1. **Backup your site** - Always backup your database and files
2. **Check customizations** - Note any custom CSS or code modifications
3. **Test on staging** - Test the new version on a staging site first

#### After Upgrading:
1. **Clear caches** - Clear any caching plugins and browser cache
2. **Check menus** - Verify navigation menus are working
3. **Test widgets** - Ensure all widgets are displaying correctly
4. **Review customizations** - Reapply any custom CSS through Customizer
5. **Test functionality** - Test comments, search, and other features

#### Known Issues:
- Custom code relying on old function names may need updates
- Some old social media services (Google Buzz) are deprecated

#### Compatibility:
- WordPress: 5.0+ (tested up to 6.4)
- PHP: 7.4+
- MySQL: 5.6+

## Support

For issues, questions, or contributions:
- GitHub Issues: https://github.com/numanrki/Qalamik/issues
- Repository: https://github.com/numanrki/Qalamik

## Contributors

- M Bilal M - Original developer (2012)
- Numan - Modernization and maintenance (2026)
- Nabeel Hasan Naqvi - Urdu OpenPad

## License

GPL-2.0-or-later
