import React, { useEffect, useState, useCallback, useRef } from 'react';
import { createRoot } from 'react-dom/client';
// MUI Components
import Box from '@mui/material/Box';
import Button from '@mui/material/Button';
//  Custom Components
import Base from '../Layouts/Base';
import api from '../../config/apisauce';
import CustomFilters from '../CustomComponents/CustomFilters';
import CustomPagination from '../CustomComponents/CustomPagination';
import CustomDialogBox from '../CustomComponents/CustomDialogBox';
// Additional Scripts
import { AgGridReact } from 'ag-grid-react';
import 'ag-grid-community/styles//ag-grid.css';
import 'ag-grid-community/styles//ag-theme-alpine.css';
import { format } from 'date-fns';
import { cloneDeep } from 'lodash';

const IntermediateTablePage = (props) => {
    // For Ag Grid
    const gridRef = useRef(null);

    const [ items, setItems ] = useState([]);
    const [ dialog, setDialog ] = useState(false);

    const [ tableState, setTableState ] = useState({
        last_page: 1
    });

    const [ filters, setFilters ] = useState({
        page: 1,
        rowPage: 10,
        search: '',
        filter: null,
        sort: 'created_at',
        sort_direction: 'desc',
        start_date: format(new Date(), 'Y-MM-dd'),
        end_date: format(new Date(), 'Y-MM-dd')
    });

    const actionButtons = (props) => {
        return (
            <Button 
                variant="contained"
                size="small"
                onClick={() => processRow(props.data)}
            >
                Extra
            </Button>
        );
    }
    
    const columns = [
        { 
            field: 'id',
            headerName: 'ID',
            hide: true
        },
        { 
            field: 'name',
            headerName: 'Name',
            flex: 1,
            sortable: true,
            comparator: function() {
                return 0;
            }
        },
        { 
            field: 'description',
            headerName: 'Description',
            flex: 1,
            sortable: true,
            comparator: function() {
                return 0;
            }
        },
        { 
            field: 'created_at',
            headerName: 'Date Added',
            flex: 1,
            sortable: true,
            comparator: function() {
                return 0;
            }
        },
        { 
            field: 'actions',
            headerName: 'Actions',
            cellRenderer: actionButtons 
        }
    ];

    // For Loading
    const showLoading = () => {
        if(gridRef.current != null) {
            if(gridRef.current.api != null) {
                gridRef.current.api.showLoadingOverlay();
            }
        }
    }

    // For Hide Loading
    const hideLoading = () => {
        if(gridRef.current != null) {
            if(gridRef.current.api != null) {
                gridRef.current.api.hideOverlay();
            }
        }
    }

    const showNoRows = () => {
        if(gridRef.current != null) {
            if(gridRef.current.api != null) {
                gridRef.current.api.showNoRowsOverlay();
            }
        }
    }

    const sortTable = (columnState) => {
        var sort = {};

        columnState.forEach(column => {
            if(column.sort != null) {
                sort.sort = column.colId;
                sort.direction = column.sort;
            }
        });
        updateFilters('sort', sort);
    }

    // For Filtering the table
    const updateFilters = (filter, value) => {
        const filtersClone = cloneDeep(filters);

        if(filter == 'search') {
            filtersClone.search = value;
        }

        if(filter == 'start_date') {
            filtersClone.start_date = value;
        }

        if(filter == 'end_date') {
            filtersClone.end_date = value;
        }

        if(filter == 'pagintation') {
            filtersClone.page = value;
        }

        if(filter == 'row_page') {
            filtersClone.rowPage = value;
            filtersClone.page = 1;
        }

        if(filter == 'sort') {
            filtersClone.sort = value.sort;
            filtersClone.sort_direction = value.direction;
        }

        setFilters(filtersClone);
    }

    const getItems = (filters) => {
        showLoading()
        api.get('/api/get_items', filters).then(
            (response) => {
                hideLoading();
                if(response.data.data.length == 0) {
                    showNoRows()
                }
                setItems(response.data.data);
                setTableState({last_page: response.data.last_page});
            }
        );
    }

    const processRow = (rowData) => {
        console.log(rowData);
        setDialog(true);
    }

    useEffect(() => {
        getItems(filters);
    }, [filters]);

    return (
        <Base>
            <Box 
                m={2}
                sx={{
                    position: 'relative',
                    height: '100%'
                }}    
            >
                
                <CustomFilters filters={filters} updateFilters={updateFilters} />
                <Box 
                    className="ag-theme-alpine"
                    sx={{
                        width: '100%',
                        // height: 'calc(100% - 76px)'
                    }}
                >
                    <AgGridReact
                        ref={gridRef}
                        domLayout={'autoHeight'}
                        rowData={items}
                        columnDefs={columns}
                        overlayLoadingTemplate={
                            '<span class="ag-overlay-loading-center">Loading...</span>'
                        }
                        overlayNoRowsTemplate={
                            '<span>No Rows Found...</span>'
                        }
                        onSortChanged={
                            (e) => {
                                sortTable(e.columnApi.getColumnState())
                            }
                        }
                    />
                    <CustomPagination
                        filters={filters}
                        updateFilters={updateFilters}
                        count={tableState.last_page}
                    />
                </Box>

                <CustomDialogBox
                    open={dialog}
                    onClose={() => setDialog(false)}
                    title={'Sample Dialog'}
                    content={
                        "Sample Text Here"
                    }
                    maxWidth="md"
                    fullWidth
                    actions={
                        <span>
                            <Button onClick={() => setDialog(false)}>Close</Button>
                        </span>
                    }
                />
            </Box>
        </Base>
    );
};

export default IntermediateTablePage;

if (document.getElementById('intermediate-table-page')) {
    const root = createRoot(document.getElementById('intermediate-table-page'));
    root.render(<IntermediateTablePage/>);
}