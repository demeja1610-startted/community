import axios from "axios";

export const fileUpload = async (url, fileList, formDataName) =>  {
    let formData = new FormData();

    for (let i = 0; i < fileList.length; i++) {
        formData.append(formDataName ? formDataName + '[]' : 'files[]', fileList[i]);
    }

    return await axios.post(url, formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        },
    })
}
