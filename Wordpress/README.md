# WordPress Notes

## Environments and architecture

- LAMP, supported by Local
- MySQL + PHP

## Themes

- Developed underneath wp-content > themes folder.
- Must contain style.css and index.php.
- style.css contains metadata used for config and that can be used for SEO.
- Screenshot.png holds the thumbnail.
- When this is setup, the theme will appear in the WP admin dashboard.

## Pages in a WP site

- Pages are hierarchical, whilst blog posts can only be organised by tags and categories.
- By default, the blog page is the landing page (index.php), and static page must be selected in settings to use a homepage (front-page.php).
- front-page.php
- single.php (a single post)
- page.php
- archive.php (collective pages)
- search.php (shows search results)
- error.php

## Customising pages

- Technically, pages are just another post type. To create custom post types, it is best not to write them in functions.php, since if the theme fails, these will not be shown. The best case is to use a "must-use" plugin.
- Custom fields are created through plugins or the theme to edit post fields (additional to the default author and time)
- Custom queries are used to collect information from a page/post that is not the current one.
- Template parts are used to create reusable components and pages.

## Block themes

- Block themes are more user friendly and can manage content just from the UI, although custom blocks can be created with the following structure:
- block.json - sets attributes and metadata
- edit.js - what is displayed on the editor
- save.js - what is displayed on the frontend
- index.js - registers the block using block.json and imports the edit and save components
- The theme.json file can set global attributes and block specific attributes that cannot be changed.
