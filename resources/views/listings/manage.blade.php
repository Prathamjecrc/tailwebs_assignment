<x-layout>
    <script src="//unpkg.com/alpinejs" defer></script>


    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Student Management
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>

              
                    
                @if(!$listings->isEmpty())
                @foreach ($listings as $listing)
                    
            
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                      
                           {{$listing->name }}
                        </a>
                    </td>

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                           {{$listing->subject }}
                        
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                           {{$listing->marks }}
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="{{url('listings/'.$listing->id.'/edit')}}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method=POST action="{{url('listings/'.$listing->id.'/delete')}}">
                            @csrf
                            @method('DELETE')
                        
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                            </form>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">
                                No Listing Found
                            </p>
                        </td>
                    </tr>
                
                @endif
            </tbody>
        </table>
    </div>
</x-layout>
