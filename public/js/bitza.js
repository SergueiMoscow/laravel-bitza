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

document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById("search_contact")
    input.oninput = function(event) {
        //data = post('/contacts/search', {'q': input.value});
        console.log(event.srcElement.value);
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '/contacts/search?q='+event.srcElement.value, true);
        xhr.responseType = 'text/html';
        xhr.send();
        xhr.onload = function(){
            divListContact = document.getElementById("list_contact");
            divListContact.innerHTML=xhr.response;
    }

        
    }
});
