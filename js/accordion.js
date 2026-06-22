function toggleAccordion(element) {
	const accordionItem = element.parentElement;
	const accordionContent = element.nextElementSibling;
	const accordionIcon = element.querySelector('.accordion-icon');
	
	// Закрываем все остальные
	const allItems = document.querySelectorAll('.accordion-item');
	allItems.forEach(item => {
		if (item !== accordionItem) {
			item.querySelector('.accordion-content').classList.remove('active');
			item.querySelector('.accordion-icon').classList.remove('fa-minus');
			item.querySelector('.accordion-icon').classList.add('fa-plus');
		}
	});
	
	// Переключаем текущий
	accordionContent.classList.toggle('active');
	if (accordionContent.classList.contains('active')) {
		accordionIcon.classList.remove('fa-plus');
		accordionIcon.classList.add('fa-minus');
	} else {
		accordionIcon.classList.remove('fa-minus');
		accordionIcon.classList.add('fa-plus');
	}
}