@props(['content', 'menu' => '', 'header' => ''])

<!doctype html>

<title>Dictionary</title>
<link href="/tailwind.min.css" rel="stylesheet">
<link href="/favicon.ico" rel="icon" type="image/x-icon">
<script src="/alpinejs.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center h-6">
            <div>
                <a href="/">
                    <h1 class="text-3xl uppercase mono">Dictionary</h1>
                </a>
            </div>

            {{ $header }}

            <div class="mt-8 md:mt-0 items-center flex">
                @if (auth()->check())
                    <p class="uppercase font-bold text-xl">{{ auth()->user()->username }}</p>
                @endif
            </div>
        </nav>

        <main class="mx-auto mt-6 lg:mt-8 space-y-6">
            <div class="inline-flex w-full">
                <div class="w-1/6">
                    <x-button noColor noPadding link href="/">Home</x-button>
                    <hr class="mx-6 my-1" />
                    {{ $menu }}
                    @if (auth()->check())
                        <form method="POST" action="/logout" class="">
                            @csrf

                            <x-button noPadding noColor>Log Out</x-button>
                        </form>
                    @else
                        <x-button href="/register" noPadding noColor link>Register</x-button>
                        <x-button href="/login" noPadding noColor link>Log In</x-button>
                    @endif

                </div>
                <div class="w-full">
                    {{ $content }}
                    @if (!auth()->check() && request()->is('/'))
                        <footer
                            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center w-1/3 min-w-fit py-16 px-10 mx-auto">
                            <h5 class="text-3xl">Sign in</h5>
                            <p class="text-sm mt-3">to account to use Dictionary App.</p>
                        </footer>
                    @endif

                </div>
            </div>
        </main>
    </section>
    <x-notification param="success" />
</body>
