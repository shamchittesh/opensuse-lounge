@extends('layouts.guest')

@section('content')
<div class="max-w-7xl mx-auto space-y-12 pb-16">
    <!-- Header -->
    <div class="text-center space-y-4">
        <h1 class="text-4xl font-bold text-primary">Style Guide</h1>
    </div>

    <!-- Buttons -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Buttons</h2>
            <p class="text-sm text-secondary mt-1">Available variants: primary, secondary, danger, ghost, outline</p>
        </div>
        
        <x-card class="space-y-8">
            <!-- Primary Buttons -->
            <div class="space-y-3">
                <h3 class="text-lg font-semibold text-primary">Primary Variant</h3>
                <div class="flex flex-wrap gap-4 items-center">
                    <x-button variant="primary" size="sm">Small Button</x-button>
                    <x-button variant="primary" size="md">Medium Button</x-button>
                    <x-button variant="primary" size="lg">Large Button</x-button>
                    <x-button variant="primary" size="md" disabled>Disabled</x-button>
                </div>
            </div>

            <!-- Secondary Buttons -->
            <div class="space-y-3">
                <h3 class="text-lg font-semibold text-primary">Secondary Variant</h3>
                <div class="flex flex-wrap gap-4 items-center">
                    <x-button variant="secondary" size="sm">Small Button</x-button>
                    <x-button variant="secondary" size="md">Medium Button</x-button>
                    <x-button variant="secondary" size="lg">Large Button</x-button>
                    <x-button variant="secondary" size="md" disabled>Disabled</x-button>
                </div>
            </div>

            <!-- Danger Buttons -->
            <div class="space-y-3">
                <h3 class="text-lg font-semibold text-primary">Danger Variant</h3>
                <div class="flex flex-wrap gap-4 items-center">
                    <x-button variant="danger" size="sm">Delete</x-button>
                    <x-button variant="danger" size="md">Remove User</x-button>
                    <x-button variant="danger" size="lg">Permanent Action</x-button>
                    <x-button variant="danger" size="md" disabled>Disabled</x-button>
                </div>
            </div>

            <!-- Ghost Buttons -->
            <div class="space-y-3">
                <h3 class="text-lg font-semibold text-primary">Ghost Variant</h3>
                <div class="flex flex-wrap gap-4 items-center">
                    <x-button variant="ghost" size="sm">Cancel</x-button>
                    <x-button variant="ghost" size="md">Learn More</x-button>
                    <x-button variant="ghost" size="lg">View Details</x-button>
                    <x-button variant="ghost" size="md" disabled>Disabled</x-button>
                </div>
            </div>

            <!-- Outline Buttons -->
            <div class="space-y-3">
                <h3 class="text-lg font-semibold text-primary">Outline Variant</h3>
                <div class="flex flex-wrap gap-4 items-center">
                    <x-button variant="outline" size="sm">Secondary</x-button>
                    <x-button variant="outline" size="md">View on GitHub</x-button>
                    <x-button variant="outline" size="lg">Get Started</x-button>
                    <x-button variant="outline" size="md" disabled>Disabled</x-button>
                </div>
            </div>
        </x-card>
    </section>

    <!-- Inputs -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Form Inputs</h2>
            <p class="text-sm text-secondary mt-1">Text inputs with labels, help text, and error states</p>
        </div>
        
        <x-card>
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Basic Input -->
                <x-input 
                    name="username" 
                    label="Username" 
                    placeholder="Enter your username"
                />

                <!-- Required Input -->
                <x-input 
                    name="email" 
                    label="Email Address" 
                    type="email"
                    placeholder="you@example.com"
                    required
                />

                <!-- Input with Help Text -->
                <x-input 
                    name="password" 
                    label="Password" 
                    type="password"
                    placeholder="••••••••"
                    helpText="Must be at least 8 characters long"
                    required
                />

                <!-- Input with Error -->
                <x-input 
                    name="confirm_password" 
                    label="Confirm Password" 
                    type="password"
                    placeholder="••••••••"
                    error="Passwords do not match"
                />

                <!-- Text Input -->
                <x-input 
                    name="phone" 
                    label="Phone Number" 
                    type="tel"
                    placeholder="+1 (555) 000-0000"
                />

                <!-- Number Input -->
                <x-input 
                    name="age" 
                    label="Age" 
                    type="number"
                    placeholder="18"
                />
            </div>
        </x-card>
    </section>

    <!-- Cards -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Cards</h2>
            <p class="text-sm text-secondary mt-1">Container components with optional titles</p>
        </div>
        
        <x-card class="grid md:grid-cols-2 gap-6">
            <!-- Basic Card -->
            <x-card>
                <p class="text-secondary">This is a basic card without a title. Perfect for simple content containers.</p>
            </x-card>

            <!-- Card with Title -->
            <x-card title="Card with Title">
                <p class="text-secondary">This card has a title header. Useful for sections that need clear labeling.</p>
            </x-card>

            <!-- Card with Complex Content -->
            <x-card title="Member Statistics">
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-secondary">Active Members:</span>
                        <span class="font-semibold text-primary">1,234</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-secondary">New This Month:</span>
                        <span class="font-semibold text-accent">42</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-secondary">Total Members:</span>
                        <span class="font-semibold text-primary">5,678</span>
                    </div>
                </div>
            </x-card>

            <!-- Card with No Padding -->
            <x-card title="No Padding Example" :padding="false">
                <div class="divide-y divide-default">
                    <div class="px-6 py-4">
                        <p class="text-secondary">Item 1</p>
                    </div>
                    <div class="px-6 py-4">
                        <p class="text-secondary">Item 2</p>
                    </div>
                    <div class="px-6 py-4">
                        <p class="text-secondary">Item 3</p>
                    </div>
                </div>
            </x-card>
        </x-card>
    </section>

    <!-- Alerts -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Alerts</h2>
            <p class="text-sm text-secondary mt-1">Notification messages with different severity levels</p>
        </div>
        
        <div class="space-y-4">
            <x-alert type="success" message="Your changes have been saved successfully!" />
            <x-alert type="info" message="Please verify your email address to continue." />
            <x-alert type="warning" message="Your session will expire in 5 minutes." />
            <x-alert type="error" message="Unable to process your request. Please try again." />
            <x-alert type="info" :dismissible="false">
                This alert cannot be dismissed. Use this for critical information that must be acknowledged.
            </x-alert>
        </div>
    </section>

    <!-- Navigation Links -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Navigation Links</h2>
            <p class="text-sm text-secondary mt-1">Links for navigation bars with active states</p>
        </div>
        
        <x-card>
            <div class="flex space-x-8 border-b border-default pb-2">
                <x-nav-link href="#" :active="true">Dashboard</x-nav-link>
                <x-nav-link href="#">Members</x-nav-link>
                <x-nav-link href="#">Reports</x-nav-link>
                <x-nav-link href="#">Settings</x-nav-link>
            </div>
        </x-card>
    </section>

    <!-- Tables -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Tables</h2>
            <p class="text-sm text-secondary mt-1">Data tables with headers and rows</p>
        </div>
        
        <x-card :padding="false">
            <x-table :headers="['Name', 'Email', 'Role', 'Status', 'Actions']">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                        John Doe
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">
                        john@example.com
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">
                        Admin
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-200">
                            Active
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <x-button variant="ghost" size="sm">Edit</x-button>
                        <x-button variant="danger" size="sm">Delete</x-button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                        Jane Smith
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">
                        jane@example.com
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">
                        Member
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-200">
                            Active
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <x-button variant="ghost" size="sm">Edit</x-button>
                        <x-button variant="danger" size="sm">Delete</x-button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">
                        Bob Wilson
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">
                        bob@example.com
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">
                        Viewer
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-200">
                            Inactive
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <x-button variant="ghost" size="sm">Edit</x-button>
                        <x-button variant="danger" size="sm">Delete</x-button>
                    </td>
                </tr>
            </x-table>
        </x-card>
    </section>

    <!-- Color Palette -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Color Palette</h2>
            <p class="text-sm text-secondary mt-1">Theme colors that adapt to light/dark mode</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Background Colors -->
            <x-card title="Backgrounds">
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-canvas border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Canvas</p>
                            <p class="text-xs text-secondary">bg-canvas</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-card border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Card</p>
                            <p class="text-xs text-secondary">bg-card</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-card-hover border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Card Hover</p>
                            <p class="text-xs text-secondary">bg-card-hover</p>
                        </div>
                    </div>
                </div>
            </x-card>

            <!-- Text Colors -->
            <x-card title="Text">
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-primary border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Primary</p>
                            <p class="text-xs text-secondary">text-primary</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-secondary border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Secondary</p>
                            <p class="text-xs text-secondary">text-secondary</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-muted border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Muted</p>
                            <p class="text-xs text-secondary">text-muted</p>
                        </div>
                    </div>
                </div>
            </x-card>

            <!-- Brand Colors -->
            <x-card title="Brand">
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-brand border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Brand</p>
                            <p class="text-xs text-secondary">bg-brand</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-brand-hover border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Brand Hover</p>
                            <p class="text-xs text-secondary">bg-brand-hover</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded bg-accent border border-default"></div>
                        <div>
                            <p class="text-sm font-medium text-primary">Accent</p>
                            <p class="text-xs text-secondary">bg-accent</p>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    </section>

    <!-- Typography -->
    <section class="space-y-6">
        <div class="border-b border-default pb-2">
            <h2 class="text-2xl font-bold text-primary">Typography</h2>
            <p class="text-sm text-secondary mt-1">Text styles and font hierarchy</p>
        </div>
        
        <x-card>
            <div class="space-y-6">
                <div>
                    <h1 class="text-5xl font-bold text-primary mb-2">Heading 1</h1>
                    <code class="text-xs text-secondary">text-5xl font-bold</code>
                </div>
                <div>
                    <h2 class="text-4xl font-bold text-primary mb-2">Heading 2</h2>
                    <code class="text-xs text-secondary">text-4xl font-bold</code>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-primary mb-2">Heading 3</h3>
                    <code class="text-xs text-secondary">text-3xl font-bold</code>
                </div>
                <div>
                    <h4 class="text-2xl font-semibold text-primary mb-2">Heading 4</h4>
                    <code class="text-xs text-secondary">text-2xl font-semibold</code>
                </div>
                <div>
                    <h5 class="text-xl font-semibold text-primary mb-2">Heading 5</h5>
                    <code class="text-xs text-secondary">text-xl font-semibold</code>
                </div>
                <div>
                    <h6 class="text-lg font-semibold text-primary mb-2">Heading 6</h6>
                    <code class="text-xs text-secondary">text-lg font-semibold</code>
                </div>
                <div>
                    <p class="text-base text-primary mb-2">Body text - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <code class="text-xs text-secondary">text-base</code>
                </div>
                <div>
                    <p class="text-sm text-secondary mb-2">Small text - Used for captions and secondary information.</p>
                    <code class="text-xs text-secondary">text-sm text-secondary</code>
                </div>
                <div>
                    <p class="text-xs text-muted mb-2">Extra small text - Used for metadata and fine print.</p>
                    <code class="text-xs text-secondary">text-xs text-muted</code>
                </div>
            </div>
        </x-card>
    </section>

    <!-- Back to Home -->
    <div class="text-center pt-8">
        <x-button href="/" variant="outline" size="lg">
            ← Back to Home
        </x-button>
    </div>
</div>
@endsection

