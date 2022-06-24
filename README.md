# sz-wp-boilerplate
_Very_ stripped-down boilerplate for WordPress theme development.

## Features
- SASS directory and base styling, as well as `sz-navbar` for pure-CSS responsive navbar
- inc directory and base customizer, helper-functions, and register-menus scripts
- template-parts directory with `article.php` base part
- functions.php queues custom CSS, FontAwesome, Google Fonts
- templates:
    - `header.php` with navbar using `sz-navbar` and `primary` menu as registered in `register-menus.php`
    - `index.php` displaying all posts using `article.php` template part
        - shows title, categories, author, date, first image (via `catch_that_image` in `helper-functions.php`), and content snippet (via `sz_get_snippet` in `helper-functions.php`).
    - `archive.php`, also using `article.php` template part
    - `page.php` using `content-container` styling
    - `single.php`, also using `content-container` styling
    - footer.php, currently empty

## Usage
1. Search for all instances of `panth-` and `panth_` and replace with your own prefix. Or don't, if you want to just keep them.

    Note: There are a few instances of `sz-` without `template` afterwards that should be left in; these are things like helper functions and libraries that I've written and included.
    
2. In functions.php, replace the url in `wp_enqueue_style('google_fonts', ...)` with your own Google Fonts url.

3. Replace whatever else you want with what you see fit.