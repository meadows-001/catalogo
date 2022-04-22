/* navbar */
function navbar() {
    let navbar = document.getElementById('navbar');

    if (navbar.className == 'navbar') {
        navbar.className += ' responsive';
    } else  {
        navbar.className = 'navbar';
    }
}

/* admin div */
function show_div() {
    let button = document.getElementById('show');
    let profiles = document.getElementById('profiles');
    let products = document.getElementById('products');

    if (button.className === 'navbar-button show-profile') {
        button.className = 'navbar-button show-product';
        profiles.style.display = 'none';
        products.style.display = 'block';
    } else {
        button.className = 'navbar-button show-profile';
        profiles.style.display = 'block';
        products.style.display = 'none';
    }
}

/* modify */
function select_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            //$('#pim').attr('src', e.target.result);
            document.getElementById('pim').src = e.target.result;
            document.getElementById('pim').style.opacity = '1';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function admin_load(url, callback, method='GET')
{
    fetch('../function/admin/' + url)
        .then(response => response.text())
        .then(data => callback(data))
}

function company_load(url, callback, method='GET')
{
    fetch('../function/company/' + url)
        .then(response => response.text())
        .then(data => callback(data))
}

function client_load(url, callback, method='GET')
{
    fetch('../function/client/' + url)
        .then(response => response.text())
        .then(data => callback(data))
}

function home_load(url, callback, method='GET')
{
    fetch('../function/home/' + url)
        .then(response => response.text())
        .then(data => callback(data))
}

function delete_element(id) {
    if (confirm('are you sure?'))
        location = "/../function/common/product_delete.php?id="+id
}

function delete_profile(id) {
    if (confirm('are you sure?'))
        location = "/../function/common/profile_delete.php?id="+id
}

function admin_modify_product(id) {
    location = "/../function/admin/product_modify.php?id="+id
}

function company_modify_product(id) {
    location = "/../function/company/product_modify.php?id="+id
}

function add_product() {
    location = "/../function/company/product_add.php"
}

function product_show(id) {
    location = "/../function/home/product-show.php?id="+id
}