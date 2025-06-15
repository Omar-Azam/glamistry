const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

// // TOGGLE SIDEBAR
// const menuBar = document.querySelector('#content nav .bx.bx-menu');
// const sidebar = document.getElementById('sidebar');

// if(sessionStorage.getItem("panel")){
// 	if(sessionStorage.getItem("panel") == "hide"){
// 		sidebar.classList.add('hide');
// 	} else if(sessionStorage.getItem("panel") == "show"){
// 		if(sidebar.classList.contains("hide")){
// 			sidebar.classList.remove('hide');
// 		}
// 	}
// } else{
// 	sessionStorage.setItem("panel", "show");
// }


// menuBar.addEventListener('click', function () {
// 	if(sessionStorage.getItem("panel") == "show"){
// 		sidebar.classList.add('hide');
// 		sessionStorage.setItem("panel", "hide");
// 	} else if(sessionStorage.getItem("panel") == "hide"){
// 		sidebar.classList.remove('hide');
// 		sessionStorage.setItem("panel", "show");
// 	}

// })

const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

// Helper: Apply sidebar state
function applySidebarState(state) {
	if (state === "hide") {
		sidebar.classList.add('hide');
	} else {
		sidebar.classList.remove('hide');
	}
	sessionStorage.setItem("panel", state);
}

// On page load: apply saved state or default to "show"
const savedState = sessionStorage.getItem("panel") || "show";
applySidebarState(savedState);

// Toggle on menu click
menuBar.addEventListener('click', () => {
	const currentState = sidebar.classList.contains('hide') ? "hide" : "show";
	const newState = currentState === "show" ? "hide" : "show";
	applySidebarState(newState);
});








const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



// const switchMode = document.getElementById('switch-mode');

// switchMode.addEventListener('change', function () {
// 	if(this.checked) {
// 		document.body.classList.add('dark');
// 	} else {
// 		document.body.classList.remove('dark');
// 	}
// })

const switchMode = document.getElementById('switch-mode');

// Load session value on page load
window.addEventListener('DOMContentLoaded', function () {
	const darkMode = sessionStorage.getItem("dark-mode");

	if (darkMode === "enabled") {
		document.body.classList.add("dark");
		switchMode.checked = true;
	}
});

// Listen for toggle switch changes
switchMode.addEventListener('change', function () {
	if (this.checked) {
		document.body.classList.add('dark');
		sessionStorage.setItem("dark-mode", "enabled");
	} else {
		document.body.classList.remove('dark');
		sessionStorage.setItem("dark-mode", "disabled");
	}
});
