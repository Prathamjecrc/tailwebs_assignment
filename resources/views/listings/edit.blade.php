<x-layout>

    <x-card class=" p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Gig
            </h2>
            <p class="mb-4">Edit: {{$listing->name}}</p>
        </header>

        <form method="POST"action="{{ url('listings/'.$listing->id.'/update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{$listing->name}}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror


            </div>

            <div class="mb-6">
                <label for="subject" class="inline-block text-lg mb-2">Subject</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subject"
                    placeholder="Example: Senior Laravel Developer" value="{{$listing->subject}}" />

                    @error('subject')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="marks" class="inline-block text-lg mb-2">Marks</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="marks"
                    placeholder="Example: Remote, Boston MA, etc" value="{{$listing->marks}}"/>
                    @error('marks')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Entry
                </button>

                <a href="{{url('/')}}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>


</x-layout>
