{{--  Alpine.JavaScript --}}
@if (session()->has('message'))  

<div x-data="{show:true}" x-init="setTimeout(()=> show=false,2000)" x-show="show" class="fixed top-0 transform left-1/2 bg-laravel -translate-x-1/2 text-white px-48 py-3">
<p>
{{session('message')}}
</p>
</div>
    
@endif