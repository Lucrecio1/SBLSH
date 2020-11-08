document.addEventListener('DOMcontentLoaded', function(){
	if (Notification.permission !== 'granted') 
			Notification.requestPermission();
});

function notifyMe(icon, title, mensagem, link){
	if (!Notification) {
		alert('O Navegador que estás utilizando não possui o Notifications. Tente o Chrome.');
		return;
	}

	if (Notification.permission !== 'granted') {
			Notification.requestPermission();
	}else{
		var notification = new Notification(title{
			icon: icon,
			body: mensagem
		});

		notification.onclick = function(){
			window.open(link);
		};
	}
}