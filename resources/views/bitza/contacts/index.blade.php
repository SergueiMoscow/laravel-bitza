<x-app-layout>
    <div class="content">
        <div class="search">
            <input class="border-gray-300 rounded-md w-full" type="text" id="search_contact" />
        </div>
        <div id="list_contact" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('bitza.contacts.list')
        </div>
    </div>
</x-app-layout>
<script src="js/bitza.js"></script>
