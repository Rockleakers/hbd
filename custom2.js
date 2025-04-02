// For Themes
const colorbtn = document.getElementById('color');
const lightbtn = document.getElementById('light');
const darkbtn = document.getElementById('dark');
var icon = document.getElementById('icon');
const body = document.body;

body.classList.add('light-theme');
ImgSrc = 'image/logo.png';
var theme = localStorage.getItem('theme');
var icons = localStorage.getItem('icons');
if(theme){
	body.classList.add(theme);
	icon.classList.add(icons);
}
lightbtn.onclick = () => {
	body.classList.remove('dark-theme');
	body.classList.remove('color-theme');
	body.classList.add('light-theme');
	localStorage.setItem('theme','light-theme');
	localStorage.setItem('icons','fa-sun');
	icons=localStorage.getItem('icons');
	icon.classList.remove('fa-moon');
	icon.classList.remove('fa-circle');
	icon.classList.add(icons);
	theme = "light-theme";
	cngimg(theme);
};
darkbtn.onclick = () => {
	body.classList.remove('color-theme');
	body.classList.remove('light-theme');
	body.classList.add('dark-theme');
	localStorage.setItem('theme','dark-theme');	
	localStorage.setItem('icons','fa-moon');
	icons=localStorage.getItem('icons');
	icon.classList.remove('fa-sun');
	icon.classList.remove('fa-circle');
	icon.classList.add(icons);
	theme = "dark-theme";
	cngimg(theme);
};
colorbtn.onclick = () => {
	body.classList.remove('dark-theme');
	body.classList.remove('light-theme');
	body.classList.add('color-theme');
	localStorage.setItem('theme','color-theme');
	localStorage.setItem('icons','fa-circle');
	icons=localStorage.getItem('icons');
	icon.classList.remove('fa-sun');
	icon.classList.remove('fa-moon');
	icon.classList.add(icons);
	theme = "color-theme";
	cngimg(theme);
};
cngimg(theme);
// For Animations
$('p').addClass('hidden');
$('.icons').addClass('hidden');
$('h1, h3, h4').addClass('hidden');
$('img').addClass('hidden');
$('tr').addClass('hidden');

// setInterval(cngimg)
function cngimg(){
	var theme = localStorage.getItem('theme');
	if (theme == "color-theme"){
		ImgSrc = 'image/logo - Color (1).png';
	}
	else if (theme == "dark-theme"){
		ImgSrc = 'image/logo - Color (1).png';
	} else {
		ImgSrc = 'image/logo.png';
	}
	var image = document.getElementsByTagName('img')[0];
	image.src = ImgSrc;
}

function getNumber(){
	return numbers[Math.floor(Math.random() * numbers.length)];
}
function generatePassword() {
	const slen = 6;
	let password = "";
	for (let i = 0; i < slen; i++){
		const x = generateX();
		password += x;
	}
	
}
