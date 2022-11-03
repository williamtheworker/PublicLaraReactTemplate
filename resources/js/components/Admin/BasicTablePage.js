import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
// MUI Components
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
//  Custom Components
import Base from '../Layouts/Base';
import api from '../../config/apisauce';
// Additional Scripts
import DataGrid from 'react-data-grid';

const columns = [
    { 
        key: 'id',
        name: 'ID',
        hide: true
    },
    { key: 'name', name: 'Name'},
    { key: 'details', name: 'Details'},
    { key: 'created_at', name: 'Date Added'},
    { 
        key: 'actions',
        name: 'Actions',
        formatter: ({ row, onRowChange, isCellSelected }) => {
            console.log('this be the row data ', row, onRowChange, isCellSelected);
            return (<Button variant="contained" size="small">Extra</Button>);
        }
    }
];

const BasicTablePage = (props) => {
    const [ items, setItems ] = useState([]);

    const getItems = () => {
        api.get('/api/items_get_all').then(
            (response) => {
                setItems(response.data);
                // console.log('this is the response ', response);
            }
        );
    }

    useEffect(() => {
        getItems();
    }, []);

    return (
        <Base>
            <Box m={2}>
                <Box>
                    <DataGrid
                        style={{
                            height: 'auto'
                        }}
                        rows={items}
                        columns={columns}
                        noRowsFallBack={
                            <Box
                                sx={{
                                    height: '50vh',
                                    width: '100%',
                                    display: 'flex',
                                    flexDirection: 'row',
                                    justifyContent: 'center',
                                    alignItems: 'center',
                                }}
                            >
                                <Typography variant='h6'>
                                    No Data
                                </Typography>
                            </Box>
                        }
                    />
                </Box>
            </Box>
        </Base>
    );
};

export default BasicTablePage;

if (document.getElementById('basic-table-page')) {
    const root = createRoot(document.getElementById('basic-table-page'));
    root.render(<BasicTablePage/>);
}