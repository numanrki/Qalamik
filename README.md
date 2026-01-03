# Qalamik - Modern RTL WordPress Theme

![Version](https://img.shields.io/badge/version-2.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)
![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)

A modern RTL (Right-to-Left) WordPress theme specifically designed for Urdu and Arabic content with beautiful Nastaleeq typography.

## ✨ Features

### Typography & Languages
- 🎨 Beautiful Nastaleeq typography for authentic Urdu rendering
- 🌍 Full RTL (Right-to-Left) language support
- 📝 Multiple font options (Jameel Noori Nastaleeq, Noto Nastaliq Urdu, Mehr Nastaliq, Amiri, Cairo)
- ⌨️ Integrated Urdu keyboard (OpenPad) for easy input
- 🌐 Translation ready with proper text domain

### WordPress Features
- ✅ WordPress 6.x compatible
- 📱 Fully responsive design
- 🎯 Block Editor (Gutenberg) support
- 🖼️ Custom logo support
- 🎨 Custom header and background
- 📋 Two widget-ready sidebars
- 💬 Threaded comments support
- 📰 Post thumbnails and featured images
- 🔍 SEO optimized
- ⚡ Performance optimized

### Design & Layout
- 📐 Three-column layout (main content + 2 sidebars)
- 🎨 Beautiful purple/gray color scheme
- 📱 Mobile-first responsive design
- 🖼️ Custom image sizes
- 🎭 Hover effects and animations

## 📦 Installation

### From WordPress Dashboard
1. Go to `Appearance` > `Themes` > `Add New`
2. Click `Upload Theme`
3. Choose the `qalamik.zip` file
4. Click `Install Now`
5. Activate the theme

### Manual Installation
1. Download the theme
2. Extract to `wp-content/themes/` directory
3. Go to `Appearance` > `Themes`
4. Activate Qalamik

## 🔧 Configuration

### Theme Setup
1. Go to `Appearance` > `Customize`
2. Configure:
   - **Site Identity**: Upload logo, set site title
   - **Header**: Configure header settings
   - **Background**: Set background color/image
   - **Menus**: Create and assign menus
   - **Widgets**: Add widgets to sidebars
   - **Typography**: Select fonts (if typography panel is available)

### Typography Settings
The theme includes advanced typography options in `inc/typography.php`:
- Choose between Urdu and Arabic fonts
- Enable/disable font preloading
- Customize font families
- Adjust line heights

### Widget Areas
- **Right Sidebar**: Categories, recent posts, bookmarks, archives
- **Left Sidebar**: Important links, recent comments

## 🛠️ Development

### Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

### File Structure
```
Qalamik/
├── functions.php          # Theme functions and setup
├── style.css             # Main stylesheet
├── header.php            # Header template
├── footer.php            # Footer template
├── index.php             # Main template
├── single.php            # Single post template
├── page.php              # Page template
├── archive.php           # Archive template
├── search.php            # Search results template
├── 404.php               # 404 error template
├── sidebar.php           # Right sidebar
├── left-sidebar.php      # Left sidebar
├── comments.php          # Comments template
├── searchform.php        # Search form
├── urdu-open-pad.js      # Urdu keyboard script
├── inc/
│   └── typography.php    # Typography functions
├── images/               # Theme images
└── readme.txt            # Theme readme
```

### Customization

#### Adding Custom CSS
Add custom CSS in `Appearance` > `Customize` > `Additional CSS`

#### Child Theme
To make customizations upgrade-safe, create a child theme:

1. Create new folder: `qalamik-child/`
2. Create `style.css`:
```css
/*
Theme Name: Qalamik Child
Template: Qalamik
*/
```
3. Create `functions.php`:
```php
<?php
function qalamik_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'qalamik_child_enqueue_styles' );
```

## 🔒 Security

The theme follows WordPress security best practices:
- All output is properly escaped
- Input is sanitized and validated
- Nonces are used for forms
- Direct file access is prevented
- Database queries are prepared statements

## 📝 Changelog

### Version 2.0 (January 2026)
- ✅ Complete modernization for WordPress 6.x
- ✅ Updated all deprecated functions
- ✅ Added proper theme setup
- ✅ Improved security with proper escaping
- ✅ Block Editor support
- ✅ Custom logo support
- ✅ HTML5 support
- ✅ Translation ready
- ✅ PHP 7.4+ compatibility
- ✅ Performance optimizations

### Version 1.1 (2012)
- Original release by M Bilal M

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## 👥 Credits

- **Original Theme**: M Bilal M - http://www.mbilalm.com/
- **Modernization**: Numan - https://github.com/numanrki
- **Urdu OpenPad**: Nabeel Hasan Naqvi

## 🆘 Support

- **Issues**: https://github.com/numanrki/Qalamik/issues
- **Documentation**: https://github.com/numanrki/Qalamik/wiki

## 🌟 Show Your Support

If you like this theme, please give it a ⭐ on GitHub!

---

Made with ❤️ for the Urdu/Arabic WordPress community
