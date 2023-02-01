<x-app-layout>
<!-- Затемнение всей страницы при открытии окна -->
    <div id="myModal" class="modal">
        <!-- Содержимое модального окна -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Контент модального окна</p>
        </div>
    </div>
    <div class="content">
        <div class="search">
            <input class="border-gray-300 rounded-md w-full" type="text" id="search_contact" />
            <button id="editBtn" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3">+</button>
        </div>
        <div class="edit">
        </div>
        <div id="list_contact" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('bitza.contacts.list')
        </div>
    </div>
</x-app-layout>
<script src="js/bitza.js"></script>
