//Books
class Book {
    constructor(title, author) {
        this.title = title;
        this.author = author;
    }
}

// UI
class UI {
    static displaySongs() {
        const books = Store.getBooks();

        books.forEach((song) => UI.addBookToList(song));
    }

    static addBookToList(book) {
        const list = document.getElementById("additions_table_content");

        const row = document.createElement("tr");

        row.innerHTML = `
            <td>${book.author}</td>
            <td>${book.title}</td>
            <td><a href="#"><i class="fas fa-times"></i></a></td>
        `;

        list.appendChild(row);
    }

    static deleteBook(target) {
        if(target.classList.contains("fa-times")) {
            target.parentElement.parentElement.parentElement.remove();
        }
    }

    static showSuccess(info) {
        const div = document.createElement("div");
        div.appendChild(document.createTextNode(info));
        div.className = "information";
        const container = document.getElementById("form_container");
        const form = document.getElementById("book_form");
        container.insertBefore(div, form);

        setTimeout(() => div.className = "information information_opacity",50);
        setTimeout(() => document.querySelector(".information").remove(), 2000);

    }

    static clearInputs() {
        document.getElementById("title").value = "";
        document.getElementById("author").value = "";
    }
}

//Display
document.addEventListener("DOMContentLoaded", UI.displaySongs);

//Add book
document.getElementById("book_form").addEventListener("submit", (event) => {

    event.preventDefault();

    const title = document.getElementById("title").value;
    const author = document.getElementById("author").value;

    const book = new Book(title, author);

    UI.addBookToList(book);
    Store.addBook(book);
    UI.showSuccess("New Song Added!")
    UI.clearInputs();
});

//Remove a book
document.getElementById("additions_table_content").addEventListener("click", (event) => {
    UI.deleteBook(event.target);
    Store.removeBook(event.target.parentElement.parentElement.previousElementSibling.textContent);
});

//Store books
class Store {
    static getBooks() {
        let books;
        if (localStorage.getItem("books") === null) {
            books= [];
        } else {
            books = JSON.parse(localStorage.getItem("books"));
        }

        return books;
    }

    static addBook(book) {
        const books = Store.getBooks();
        books.push(book);
        localStorage.setItem("books", JSON.stringify(books));
    }

    static removeBook(title) {
        const books = Store.getBooks();

        books.forEach((book, position) => {
            if(book.title === title) {
                books.splice(position, 1);
            }
        }); 

        localStorage.setItem("books", JSON.stringify(books));
    }
}