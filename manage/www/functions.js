function update_settings() {
    const formData = new FormData(document.forms['settings']);
    const deleteElements = [];
    const updateElements = [];
    var new_pair = {};
    for (const [key, value] of formData.entries()) {
        console.log(key, value);
        if (key.startsWith('delete_')) {
            deleteElements.push(key.slice(7));
        } else if (key.startsWith('update_') && value != "") {
            temp_element = {
                'key': key.slice(7),
                'value': value}
            updateElements.push(temp_element);
        }
    }

    //if the keys 'new_key' and 'new_value' are not empty, add them to the new_pair object
    if (formData.get('new_key') != "" && formData.get('new_value') != "") {
        new_pair = {
            'key': formData.get('new_key'),
            'value': formData.get('new_value')
        }
    }
    const data = { delete: deleteElements, update: updateElements, add: new_pair };
    const data_json = JSON.stringify(data);
    console.log(data_json);

    const params = new URLSearchParams(data);

    fetch('update_settings.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
          },
        body: data_json
    })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error(error));

    
}