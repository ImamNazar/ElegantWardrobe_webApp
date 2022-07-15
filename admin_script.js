let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () =>{
	navbar.classList.toggle('active');
}

document.querySelector('#user-btn').onclick = () =>{
	navbar.classList.toggle('active');
	accountBox.classList.remove('active');
}

window.onscroll = () =>{
	navbar.classList.toggle('active');
	accountBox.classList.remove('active');
}


/*document.querySelector('#close-update').onclick = () =>{
	document.querySelector('.edit-product-form').style.display = 'none';
	window.location.href = 'admin_shopmen.php';
}

document.querySelector('#close-update').onclick = () =>{
	document.querySelector('.edit-product-form').style.display = 'none';
	window.location.href = 'admin_shopwomen.php';
}

document.querySelector('#close-update').onclick = () =>{
	document.querySelector('.edit-product-form').style.display = 'none';
	window.location.href = 'admin_shopkids.php';
}*/



