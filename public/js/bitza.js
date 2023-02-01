function post(url, data = {}) {
    // Определяем функцию которая принимает в качестве параметров url и данные которые необходимо обработать:
    const postData = async (url, data) => {
        // Формируем запрос
        const response = await fetch(url, {
            // Метод, если не указывать, будет использоваться GET
            method: 'GET',
            // Заголовок запроса
            headers: {
                'Content-Type': 'application/json'
            },
            // Данные
            body: JSON.stringify(data)
        });
        console.log(response.json());
        return response.json();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById("search_contact")
    input.oninput = function (event) {
        //data = post('/contacts/search', {'q': input.value});
        console.log(event.srcElement.value);
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '/contacts/search?q=' + event.srcElement.value, true);
        xhr.responseType = 'text';
        xhr.send();
        xhr.onload = function () {
            divListContact = document.getElementById("list_contact");
            divListContact.innerHTML = xhr.response;
        }
    }

    const modal = document.querySelector('#myModal');

    // назначаем обработчик события для клика по кнопке открытия окна
    document.querySelector('#editBtn').addEventListener('click', openModal);

    /*
     * Обработчик события клика по кнопке открытия модального окна
     */
    function openModal() {
        modal.classList.add('modal-open');
        // обработчики событий, которые работают, когда окно открыто
        attachModalEvents();
    }

    /*
     * Функция назначает обработчики событий к элементам модального окна при открытии
     */
    function attachModalEvents() {
        // закрывать модальное окно при нажатии на крестик
        modal.querySelector('.close').addEventListener('click', closeModal);
        // закрывать модальное окно при нажатии клавиши Escape
        document.addEventListener('keydown', handleEscape);
        // закрывать модальное окно при клике вне контента модального окна
        modal.addEventListener('click', handleOutside);
    }

    /*
     * Обработчик события клика по кнопке закрытия модального окна
     */
    function closeModal() {
        modal.classList.remove('modal-open');
        // окно закрыто, эти обработчики событий больше не нужны
        detachModalEvents();
    }

    /*
     * Функция удаляет обработчики событий к элементам модального окна при закрытии
     */
    function detachModalEvents() {
        modal.querySelector('.close').removeEventListener('click', closeModal);
        document.removeEventListener('keydown', handleEscape);
        modal.removeEventListener('click', handleOutside);
    }

    /*
     * Функция закрывает модальное окно при нажатии клавиши Escape
     */
    function handleEscape(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    }

    /*
     * Функция закрывает модальное окно при клике вне контента модального окна
     */
    function handleOutside(event) {
        const isClickInside = !!event.target.closest('.modal-content');
        if (!isClickInside) {
            closeModal();
        }
    }

});
