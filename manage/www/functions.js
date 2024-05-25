function update_settings() {
    const formData = new FormData(document.forms['settings']);
    const deleteElements = [];
    const updateElements = [];
    var new_pair = {};
    for (const [key, value] of formData.entries()) {
        if (key.startsWith('delete_')) {
            deleteElements.push(key.slice(7));
        } else if (key.startsWith('update_') && value != "") {
            temp_element = {
                'key': key.slice(7),
                'value': value}
            updateElements.push(temp_element);
        }
    }

    if (formData.get('new_key') != "" && formData.get('new_value') != "") {
        new_pair = {
            'key': formData.get('new_key'),
            'value': formData.get('new_value')
        }
    }
    const data = { delete: deleteElements, update: updateElements, add: new_pair };
    const data_json = JSON.stringify(data);

    const params = new URLSearchParams(data);

    fetch('update_settings.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
          },
        body: data_json
    })
        .then(response => {if (response.ok) {
            location.reload();
        }})
        .catch(error => console.error(error));
}

function update_channels() {
    const formData = new FormData(document.forms['channels']);
    const deleteElements = [];
    const updateElements = [];
    var new_pair = {};
    for (const [key, value] of formData.entries()) {
        if (key.startsWith('deletechannel_')) {
            console.log("Found delete key: " + key + " with value: " + value);
            deleteElements.push(key.slice(14));
        } else if (key.startsWith('updatechannel_') && value != "") {
            temp_element = {
                'id': key.slice(14),
                'name': value}
            updateElements.push(temp_element);
        }
    }
    if (formData.get('new_channel_name') != "" && formData.get('new_channel_id') != "") {
        new_pair = {
            'name': formData.get('new_channel_name'),
            'id': formData.get('new_channel_id')
        }
    }
    const data = { delete: deleteElements, update: updateElements, add: new_pair };
    const data_json = JSON.stringify(data);
    console.log(data_json);
    const params = new URLSearchParams(data);
    fetch('update_channels.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
          },
        body: data_json
    })
        .then(response => {if (response.ok) {
            location.reload();
        }})
        .then(data => console.log(data))
        .catch(error => console.error(error));
}

function update_videos() {
    const formData = new FormData(document.forms['videos']);
    const deleteElements = [];
    for (const [key, value] of formData.entries()) {
        if (key.startsWith('deletevideo_')) {
            console.log("Found delete key: " + key + " with value: " + value);
            deleteElements.push(key.slice(12));
        }
    }
    const data = { delete: deleteElements};
    const data_json = JSON.stringify(data);
    const params = new URLSearchParams(data);
    fetch('update_videos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
          },
        body: data_json
    })
        .then(response => {if (response.ok) {
            location.reload();
        }})
        .then(data => console.log(data))
        .catch(error => console.error(error));
}