window.addEventListener('load', function () {
    SortableTables()
});

const SortableTables = () => {
    const getTables = document.getElementsByTagName('table');
    for (let table of getTables) {
        if (table.classList.contains('table-sort')) {
            activateSortable(table);
        }
    }
}

const activateSortable = (table) => {
    if (table.getElementsByTagName('thead').length === 0){
        return false;
    }
    if (table.getElementsByTagName('tbody').length === 0){
        return false;
    }
    const tableBody = table.querySelector('tbody');
    const tableHeader = table.querySelector('thead');
    const headerColumns =  tableHeader.querySelectorAll('th');

    headerColumns.forEach((th, index) => {
        if (!th.classList.contains('disable-sort')) {
            th.classList.add('sort-arrow');
            eachColumns(table, tableBody, index, th);
        }
    });
}

const eachColumns = (table, tableBody, columnIndex, th) => {
    th.addEventListener('click', function (compareFn) {
        let result = {};
        const columnData = [];
        const colSpanData = {};
        const colSpanSum = {};

        const visibleTableRows = Array.prototype.filter.call(
            tableBody.querySelectorAll('tr'),
            (tr) => {
                return tr.style.display !== 'none';
            }
        );

        const isDataAttribute = th.classList.contains('data-sort');
        if (isDataAttribute) {
            for (let [i, tr] of visibleTableRows.entries()) {
                const dataAttributeTd = tr.querySelectorAll('td').item(columnIndex).dataset.sort;
                columnData.push(`${dataAttributeTd}#${i}`);
                result[columnData[i]] = tr.innerHTML;
            }
        }

        table.querySelectorAll('th').forEach((th, index) => {
            colSpanData[index] = th.colSpan;
            if (index === 0) colSpanSum[index] = th.colSpan;
            else colSpanSum[index] = colSpanSum[index - 1] + th.colSpan;
        });

        for (let [i, tr] of visibleTableRows.entries()) {
            let tdTextContent = tr
                .querySelectorAll('td')
                .item(
                    colSpanData[columnIndex] === 1
                        ? colSpanSum[columnIndex] - 1
                        : colSpanSum[columnIndex] - colSpanData[columnIndex]
                ).textContent;

            if (tdTextContent.length === 0) {
                tdTextContent = '';
            }

            if (tdTextContent.trim() !== '') {
                if (!isDataAttribute) {
                    columnData.push(`${tdTextContent}#${i}`);
                    result[`${tdTextContent}#${i}`] = tr.innerHTML;
                }
            } else {
                columnData.push(`!EMPTY!CONTENT!#${i}`);
                result[`!EMPTY!CONTENT!#${i}`] = tr.innerHTML;
            }
        }

        let sortType = 'desc';
        if (th.classList.contains('sort-arrow-down')) {
            sortType = 'asc'
        } else if (th.classList.contains('sort-arrow-up')) {
            sortType = 'desc'
        }
        resetArrowStyle(table, columnIndex, sortType);

        if (sortType === 'desc') {
            columnData.sort(sortDesc);
        } else {
            columnData.sort(sortAsc);
        }

        for (let [i, tr] of visibleTableRows.entries()) {
            tr.innerHTML = result[columnData[i]];
        }
    });
}

const resetArrowStyle = (table, currentIndex, sortType) => {
    table.querySelectorAll('th').forEach((th, index) => {
        if (!th.classList.contains('disable-sort')) {
            if (th.classList.contains('sort-arrow-down')) {
                th.classList.remove('sort-arrow-down');
            }
            if (th.classList.contains('sort-arrow-up')) {
                th.classList.remove('sort-arrow-up');
            }
            if (!th.classList.contains('sort-arrow')) {
                th.classList.add('sort-arrow');
            }
            if (index === currentIndex) {
                th.classList.remove('sort-arrow');
                if (sortType === 'desc') {
                    th.classList.add('sort-arrow-down');
                } else if (sortType === 'asc') {
                    th.classList.add('sort-arrow-up');
                }
            }
        }
    });
}

const sortAsc = (a, b) => {
    if (a.includes("!EMPTY!CONTENT!#")) {
        return 1;
    } else if (b.includes("!EMPTY!CONTENT!#")) {
        return -1;
    } else {
        return a.localeCompare(
            b,
            navigator.languages[0] || navigator.language,
            { numeric: true, ignorePunctuation: true }
        );
    }
}

const sortDesc = (a, b) => {
    return sortAsc(b, a);
}
