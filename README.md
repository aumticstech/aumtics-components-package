# Aumtics Components Package

A Laravel package containing reusable UI components for Aumtics applications. This package provides a collection of Blade components that can be easily integrated into any Laravel project.

## Features

- 🎨 Pre-built UI components with modern styling
- 🔧 Easy installation via Composer
- 📱 Responsive design components
- ⚡ Optimized for Laravel 10+ and 11+
- 🎯 Tailwind CSS compatible
- 📦 Publishable views for customization

## Requirements

- PHP 8.1+
- Laravel 10+ or 11+
- Tailwind CSS (recommended)

## Installation

### Step 1: Install via Composer

You can install this package from your GitHub repository using Composer:

```bash
composer require aumtics/aumtics-components
```

Or if installing directly from GitHub:

```bash
composer require aumtics/aumtics-components:dev-main
```

### Step 2: Add Repository to composer.json (if needed)

If the package is in a private repository, add this to your `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/your-username/prime-components-package"
        }
    ]
}
```

### Step 3: Publish Assets (Optional)

To customize the views, publish them to your application:

```bash
php artisan vendor:publish --tag=aumtics-components-views
```

To publish the configuration file:

```bash
php artisan vendor:publish --tag=aumtics-components-config
```

## Available Components

### Table Component

A responsive table wrapper with card styling.

```blade
<x-aumtics-table card-id="my-table">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td><button>Edit</button></td>
            </tr>
        </tbody>
    </table>
</x-aumtics-table>
```

### Alert Component

Display alerts with different types and dismissible functionality.

```blade
<x-aumtics-alert message="Success! Data has been saved." type="success" />
<x-aumtics-alert message="Warning! Please check your input." type="warning" />
<x-aumtics-alert message="Error! Something went wrong." type="danger" />
```

### Dashboard Header Component

A complete header component with breadcrumbs and navigation.

```blade
<x-aumtics-dashboard-header 
    page-title="Dashboard" 
    :breadcrumb-items="[
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Dashboard', 'active' => true]
    ]">
    <!-- Header actions slot -->
    <button class="btn btn-primary">Add New</button>
</x-aumtics-dashboard-header>
```

## Component List

- `<x-aumtics-table>` - Responsive table wrapper
- `<x-aumtics-alert>` - Alert notifications
- `<x-aumtics-dashboard-header>` - Page header with breadcrumbs
- `<x-aumtics-dashboard-settings>` - Settings panel
- `<x-aumtics-sidebar-menu>` - Navigation sidebar
- `<x-aumtics-custom-field>` - Dynamic custom fields
- `<x-aumtics-loader>` - Loading spinner
- `<x-aumtics-no-data-found>` - Empty state component
- `<x-aumtics-sub-sidebar>` - Secondary sidebar
- `<x-aumtics-customer-basket>` - Customer basket widget
- `<x-aumtics-assigned-organization>` - Organization selector
- `<x-aumtics-dashboard-footer>` - Footer component

## Customization

### Publishing Views

After publishing the views, you can customize them in:
```
resources/views/vendor/aumtics-components/components/
```

### Configuration

The configuration file allows you to:
- Set default component properties
- Configure asset paths
- Customize component behavior

### CSS Classes

All components use Tailwind CSS classes. You can:
1. Override styles by publishing views
2. Add custom CSS classes via component props
3. Use Tailwind's utility classes for quick styling

## Development

### Setting up for Development

1. Clone the repository
2. Run `composer install`
3. Create a test Laravel application
4. Add the package to the test app's composer.json

### Testing

```bash
composer test
```

### Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## Usage Examples

### Basic Table with Data

```blade
<x-aumtics-table card-id="users-table">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-aumtics-table>
```

### Complete Page Layout

```blade
<x-aumtics-dashboard-header 
    page-title="User Management" 
    :breadcrumb-items="[
        ['name' => 'Home', 'url' => route('home')],
        ['name' => 'Users', 'active' => true]
    ]">
    <button class="btn btn-primary">Add User</button>
</x-aumtics-dashboard-header>

@if(session('success'))
    <x-aumtics-alert message="{{ session('success') }}" type="success" />
@endif

<x-aumtics-table card-id="users-table">
    <!-- Your table content -->
</x-aumtics-table>
```

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).

## Support

For support, please contact the development team or create an issue in the repository.

## Changelog

### Version 1.0.0
- Initial release
- Basic components: Table, Alert, Dashboard Header
- Laravel 10+ support
- Tailwind CSS integration 