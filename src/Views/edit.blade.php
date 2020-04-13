@php($message = 'Ni idea')

<div class="w-full p-6 flex">
    @if($template->exists)
        <form class="flex flex-col w-full" method="POST" action="{{ route('crud.update', $template) }}">
            @method('put')
            EStoy aqui
    @else
        <form class="flex flex-col w-full" method="POST" action="{{ route('crud.store') }}">
    @endif

            @csrf
            <div class="flex w-full">
                {{-- form input element --}}
                <div class="flex flex-wrap mb-6 w-1/3">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Template Name:</label>
                    <input id="name" type="text" required name="name"
                        value="{{ old('name', $template->name ?? 'Por defecto') }}"
                        class="text-base font-mono shadow appearance-none border rounded 
                            w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                            @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>

                {{-- form input element --}}
                <div class="flex flex-wrap mb-6 w-2/3 ml-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">email:</label>
                    <input id="email" type="text" required name="email" value="{{ old('email', $template->email) }}"
                        class="text-base font-mono shadow appearance-none border rounded w-full 
                        py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                        @error('email') border-red-500 @enderror">
                        
                    @error('email')
                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>

                {{-- form input element --}}
                <div class="flex flex-wrap mb-6 w-2/3 ml-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">password:</label>
                    <input id="password" type="text" required name="password" value="{{ old('password', $template->password) }}"
                        class="text-base font-mono shadow appearance-none border rounded w-full 
                        py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                        @error('password') border-red-500 @enderror">
                        
                    @error('password')
                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            // irrelevant form elements removed.....
            <button class="positive-button" type="submit">Save </button>
        <form>
</div>