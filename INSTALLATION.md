# Installation Guide

This guide will help you install and use the Prime Components package in your Laravel project.

## Prerequisites

- Laravel 10+ or 11+
- PHP 8.1+
- Composer

## Step-by-Step Installation

### 1. Add the Package Repository

Since this is a private package, you need to add the repository to your project's `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/your-username/prime-components-package.git"
        }
    ]
}
```

### 2. Install the Package

Run the following command in your Laravel project root:

```bash
composer require aumtics/prime-components:dev-main
```

### 3. Publish Assets (Optional)

If you want to customize the component views:

```bash
php artisan vendor:publish --tag=prime-components-views
```

If you want to customize the configuration:

```bash
php artisan vendor:publish --tag=prime-components-config
```

### 4. Clear Cache

Clear your application cache to ensure the new components are registered:

```bash
php artisan config:clear
php artisan view:clear
php artisan cache:clear
```

## Quick Test

Create a test route to verify the installation:

**routes/web.php**
```php
Route::get('/test-components', function () {
    return view('test-components');
});
```

**resources/views/test-components.blade.php**
```blade
<!DOCTYPE html>
<html>
<head>
    <title>Prime Components Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Prime Components Test</h1>
        
        <!-- Test Alert Component -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Alert Component</h2>
            <x-prime-alert message="This is a success alert!" type="success" />
        </div>
        
        <!-- Test Table Component -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Table Component</h2>
            <x-prime-table card-id="test-table">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-6 py-4">John Doe</td>
                            <td class="px-6 py-4">john@example.com</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Active</span>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-6 py-4">Jane Smith</td>
                            <td class="px-6 py-4">jane@example.com</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-prime-table>
        </div>
        
        <!-- Test Dashboard Header Component -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Dashboard Header Component</h2>
            <x-prime-dashboard-header 
                page-title="Test Dashboard" 
                :breadcrumb-items="[
                    ['name' => 'Home', 'url' => '/'],
                    ['name' => 'Test', 'active' => true]
                ]">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Action Button</button>
            </x-prime-dashboard-header>
        </div>
    </div>
</body>
</html>
```

Visit `/test-components` in your browser to see the components in action.

## GitHub Repository Setup

### 1. Create GitHub Repository

1. Go to GitHub and create a new repository named `prime-components-package`
2. Don't initialize with README (we already have one)

### 2. Push to GitHub

In your package directory, run:

```bash
# Add GitHub remote
git remote add origin https://github.com/your-username/prime-components-package.git

# Push to GitHub
git branch -M main
git push -u origin main
```

### 3. Create Release (Optional)

1. Go to your GitHub repository
2. Click "Releases" → "Create a new release"
3. Tag version: `v1.0.0`
4. Release title: `Prime Components v1.0.0`
5. Describe the release features
6. Click "Publish release"

## Using in Projects

### Method 1: Composer with VCS Repository

In your Laravel project's `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/your-username/prime-components-package.git"
        }
    ],
    "require": {
        "aumtics/prime-components": "dev-main"
    }
}
```

Then run:
```bash
composer install
```

### Method 2: Packagist (If Published)

If you publish to Packagist, users can install with:

```bash
composer require aumtics/prime-components
```

## Troubleshooting

### Components Not Found

If components are not found, try:

```bash
php artisan config:clear
php artisan view:clear
composer dump-autoload
```

### View Not Found Errors

Ensure the service provider is properly registered. Check `config/app.php` or verify auto-discovery is working.

### Styling Issues

Make sure Tailwind CSS is installed and configured in your project:

```bash
npm install -D tailwindcss
npx tailwindcss init
```

Add to your `tailwind.config.js`:

```javascript
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/aumtics/prime-components/src/resources/views/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

## Support

For issues or questions:
1. Check the main README.md
2. Create an issue on GitHub
3. Contact the development team 