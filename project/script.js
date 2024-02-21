function showForm(formId) {
    console.log('Clicked on Add Medicine link');
    var forms = document.getElementsByClassName('content');
    for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = 'none';
    }

    document.getElementById(formId).style.display = 'block';
}
