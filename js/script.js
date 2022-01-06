window.addEventListener('load', () => {
	let floatingNavbar = document.querySelector('.floating-navbar')
	console.log(floatingNavbar)

	window.addEventListener('scroll', () => {
		if(this.scrollY >= 155){
			floatingNavbar.classList.remove('top')
		} else {
			floatingNavbar.classList.add('top')
		}
	});
});