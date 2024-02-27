# Potters Craft System

## Project Overview
Potters Craft System is a Laravel 10.x based system designed to streamline pottery crafting processes. It provides a comprehensive set of tools for managing pottery production, inventory, sales, and customer interactions.

## Project Extra Structure

### Custom Helpers
The `Custom Helpers` folder contains custom classes that enhance the project's functionality. These classes are designed to provide additional features or utilities that are not available in the standard Laravel framework.

### Layouts
The `Layouts` folder contains all kinds of base layouts for UI to be built on. These layouts serve as the foundation for the project's user interface, providing a consistent look and feel across different pages.

### Partial
The `Partial` folder contains partial files used in layouts and other pages. These partial files typically represent reusable components or sections of a page, such as headers, footers, or sidebars.

### Livewire
The `Livewire` folder contains classes for Livewire view components, which hold the logic for such views. Livewire is a Laravel package that allows you to build dynamic web interfaces using server-side code.

### User
The `User` folder contains Blade views for regular users of the system. These views are designed to provide an interface for users to interact with the system, such as viewing information, submitting forms, or performing other actions.

## Packages Used
 - `Livewire`: Used to add reactivity to the Laravel app, enabling dynamic updates without page refreshes.
 - `Blueprint`: Used to seamlessly generate models, migrations, seeders, and factories, enhancing the development workflow.

## Routes

- **User Routes:**
  - **localhost:8000/**: User login and user-related routes.
  
- **Admin Routes:**
  - **localhost:8000/admin**: Admin login and admin-related routes.
