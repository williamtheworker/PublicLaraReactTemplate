import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
// MUI Components
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
//  Custom Components
import Base from '../Layouts/Base';
import api from '../../config/apisauce';
import CustomNotification from '../CustomComponents/CustomNotification';
// Additional Scripts
import { FileUploader } from "react-drag-drop-files";

const InputSamplesPage = (props) => {
    const fileTypes = ["JPG", "PNG", "GIF"];
    const [ openNotification, setOpenNotification ] = useState(false);
    const [ notification, setNotification ] = useState('');

    const [ file, setFile ] = useState(null);

    const showNotification = () => {
        setOpenNotification(true);
    }

    const hideNotification = () => {
        setOpenNotification(false);
    }

    const handleChange = (file) => {
        setFile(file);
    };

    const UploadFile = () => {
        const formData = new FormData();
        formData.append('file', file);

        console.log('this is the formdata ', formData)

        api.post('/api/upload_file', formData, { headers: {'content-type': 'multipart/form-data'}}).then(
            (response) => {
                if(response.data.status == 'success') {
                    setNotification('Upload Success');
                    showNotification();
                } else {
                    setNotification('Upload Failed');
                    showNotification();
                }
                console.log('this is the response', response);
            }
        )
    }

    return (
        <Base>
            <CustomNotification show={openNotification} message={notification} hide={hideNotification} />
            <Box m={2}>
                <Box>
                    <FileUploader handleChange={handleChange} name="file" types={fileTypes} />
                    <Button variant="contained" onClick={() => UploadFile()}>Upload</Button>
                </Box>
            </Box>
        </Base>
    );
};

export default InputSamplesPage;

if (document.getElementById('input-samples-page')) {
    const root = createRoot(document.getElementById('input-samples-page'));
    root.render(<InputSamplesPage/>);
}