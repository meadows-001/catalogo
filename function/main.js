/* navbar */
function navbar() {
    let navbar = document.getElementById('navbar');

    if (navbar.className == 'navbar') {
        navbar.className += ' responsive';
    } else {
        navbar.className = 'navbar';
    }
}

/* admin div */
function show_div() {
    let button = document.getElementById('show');
    let profiles = document.getElementById('profiles');
    let products = document.getElementById('products_info');

    if (button.className === 'navbar-button show-profile g') {
        button.className = 'navbar-button show-product g';
        profiles.style.display = 'none';
        products.style.display = 'flex';
    } else {
        button.className = 'navbar-button show-profile g';
        profiles.style.display = 'flex';
        products.style.display = 'none';
    }
}

/* modify */
function select_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            //$('#pim').attr('src', e.target.result);
            document.getElementById('item-image').src = e.target.result;
            document.getElementById('item-image').style.opacity = '1';
        };

        reader.readAsDataURL(input.files[0]);
    }
}


function ajax_load(url, callback, method = 'GET') {
    fetch('../function/' + url)
        .then(response => response.text())
        .then(data => callback(data))
}

function delete_element(id) {
    if (confirm('are you sure?'))
        location = "../function/product_delete.php?id=" + id
}

function delete_profile(id) {
    if (confirm('are you sure?'))
        location = "../function/profile_delete.php?id=" + id
}

function delete_category(id) {
    if (confirm('are you sure?'))
        location = "../function/category_delete.php?id=" + id
}

function admin_modify_product(id) {
    location = "../function/admin_product_modify.php?id=" + id
}

function company_modify_product(id) {
    location = "../function/company_product_modify.php?id=" + id
}

function add_product() {
    location = "../function/company_product_add.php"
}