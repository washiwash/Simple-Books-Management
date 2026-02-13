import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
	const modal = document.getElementById('addModal');
	const openButton = document.getElementById('openModal');
	const closeButton = document.getElementById('closeModal');

	if (!modal || !openButton || !closeButton) return;

	const openModal = () => {
		modal.classList.remove('hidden');
		modal.classList.add('flex');
	};

	const closeModal = () => {
		modal.classList.add('hidden');
		modal.classList.remove('flex');
	};

	openButton.addEventListener('click', openModal);
	closeButton.addEventListener('click', closeModal);
});


document.addEventListener('DOMContentLoaded', () => {
	const editModal = document.getElementById('editModal');
	const closeEditButton = document.getElementById('closeEditModal');
	const editButtons = document.querySelectorAll('.openEditModal');
	const editForm = document.getElementById('editBookForm');
	const editTitle = document.getElementById('edit_title');
	const editPreview = document.getElementById('edit_image_preview');
	const editImage = document.getElementById('edit_image');

	if (!editModal || !closeEditButton || !editForm || !editTitle || !editPreview) return;

	const openEditModal = (action, title, imageUrl) => {
		editForm.setAttribute('action', action);
		editTitle.value = title || '';
		editPreview.src = imageUrl || '';
		if (editImage) editImage.value = '';
		editModal.classList.remove('hidden');
		editModal.classList.add('flex');
	};

	const closeEditModal = () => {
		editModal.classList.add('hidden');
		editModal.classList.remove('flex');
	};

	editButtons.forEach((button) => {
		button.addEventListener('click', () => {
			openEditModal(button.dataset.action, button.dataset.title, button.dataset.imageUrl);
		});
	});

	closeEditButton.addEventListener('click', closeEditModal);
});


