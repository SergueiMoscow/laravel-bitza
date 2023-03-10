const post = (url, data = {}) => {
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

const ajax = (args = {}) => {
    let method = "POST";
    if (args.method) {
      method = args.method;
    }
    const responseType = args.responseType || "text";
    const defaultError = (event) => {
      alert(`Error: ${event}`);
    };
    const xhr = new XMLHttpRequest();
    let params = "";
    if (args.data) {
      params = new URLSearchParams(args.data).toString();
    }
    xhr.open(method, args.url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (args.headers) {
      Object.entries(args.headers).forEach(entry => {
        [key, value] = entry;
        xhr.setRequestHeader(key, value);
      });
    }
    xhr.responseType = responseType;
    console.log(`Ajax (${method}) ${args.url} p: ${params}`);
    xhr.send(params);
    xhr.onload = function () {
      args.success(xhr.response);
    };
    if (args.error) {
      xhr.onerror = function () {
        args.error(xhr.response);
      };
    } else {
      xhr.onerror = defaultError;
    }
  };
    
const deletedoc = (id, contact_id) => {
    if (confirm('Удалить документ?')) {
        ajax({
            method: "POST",
            url: '/deletedoc',
            data: { id: id,
                contact_id: contact_id },
            responseType: 'text',
            success: () => {
                alert('doc');
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    let input = document.getElementById("search_contact")
    if (input) {
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
    }

    input = document.getElementById("search_contract")
    if (input) {
        input.oninput = function (event) {
            //data = post('/contracts/search', {'q': input.value});
            console.log(event.srcElement.value);
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '/contracts/search?q=' + event.srcElement.value, true);
            xhr.responseType = 'text';
            xhr.send();
            xhr.onload = function () {
                divListContract = document.getElementById("list_contract");
                divListContract.innerHTML = xhr.response;
            }
        }
    }

    if (document.querySelector(".click-show-contact")) {
        document.querySelector(".click-show-contact").addEventListener('click', function(event) {
            console.log(event.target);
    //        console.log(event.target.getAttribute('data-contact-id'));
        });
    }

    const modal = document.querySelector('#myModal');

    /*
     * Обработчик события клика по кнопке открытия модального окна
     */
    const openModal = () => {
        modal.classList.add('modal-open');
        // обработчики событий, которые работают, когда окно открыто
        attachModalEvents();
    }

    // назначаем обработчик события для клика по кнопке открытия окна
    if (document.querySelector("#editBtn")) {
        document.querySelector('#editBtn').addEventListener('click', openModal);
    }


    /*
     * Функция назначает обработчики событий к элементам модального окна при открытии
     */
    const attachModalEvents = () => {
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
    const closeModal = () => {
        modal.classList.remove('modal-open');
        // окно закрыто, эти обработчики событий больше не нужны
        detachModalEvents();
    }

    /*
     * Функция удаляет обработчики событий к элементам модального окна при закрытии
     */
    const detachModalEvents = () => {
        modal.querySelector('.close').removeEventListener('click', closeModal);
        document.removeEventListener('keydown', handleEscape);
        modal.removeEventListener('click', handleOutside);
    }

    /*
     * Функция закрывает модальное окно при нажатии клавиши Escape
     */
    const handleEscape = (event) => {
        if (event.key === 'Escape') {
            closeModal();
        }
    }

    /*
     * Функция закрывает модальное окно при клике вне контента модального окна
     */
    const handleOutside = (event) => {
        const isClickInside = !!event.target.closest('.modal-content');
        if (!isClickInside) {
            closeModal();
        }
    }

});
