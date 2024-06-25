var baseUrl = document.querySelector("input[name=baseurl]")?.value;
var t = document.querySelector("input[name=t]")?.value;
let tb1 = new DataTable("#students", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/getAllUsers/' + (t == "enrolled" ? "1" : (t == "unregistered" ? "0" : "")),
        type: 'POST',
        dataFilter: function (data) {
            // console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "fullname",
            render: function (data, type, row) {
                return `
                <span class="text-truncate">${data}</span>
                `;
            }
        },
        {
            "data": "whatsapp",
            render: function (data, type, row) {
                return `${data} `;
            }
        },
        {
            "data": "enrollment_date",
            render: function (data, type, row) {
                let date = new Date(data);
                let day = String(date.getDate()).padStart(2, '0');
                let month = String(date.getMonth() + 1).padStart(2, '0');
                let year = date.getFullYear();
                return `${day}.${month}.${year} `;
            }
        },
        {
            "data": "email",
            render: function (data, type, row) {
                return `
                <div class="btns">
                  <a href="${baseUrl}/admin/student_overview?id=${row.email}">View</a>
                  <a href="${baseUrl}/admin/student_delete?id=${row.email}" class="red">Remove</a>
                </div>
                `;
            }
        }
    ]
})
let tb2 = new DataTable("#class", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/getAllUsersByClass?class=' + t,
        type: 'POST',
        dataFilter: function (data) {
            // console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "fullname",
            render: function (data, type, row) {
                return `
                <span class="text-truncate">${data}</span>
                `;
            }
        },
        {
            "data": "whatsapp",
            render: function (data, type, row) {
                return `${data} `;
            }
        },
        {
            "data": "enrollment_date",
            render: function (data, type, row) {
                let date = new Date(data);
                let day = String(date.getDate()).padStart(2, '0');
                let month = String(date.getMonth() + 1).padStart(2, '0');
                let year = date.getFullYear();
                return `${day}.${month}.${year} `;
            }
        },
        {
            "data": "email",
            render: function (data, type, row) {
                return `
                <div class="btns">
                  <a href="${baseUrl}/admin/student_overview?id=${row.email}">View</a>
                  <a href="${baseUrl}/admin/student_delete?id=${row.email}" class="red">Remove</a>
                </div>
                `;
            }
        }
    ]
})
let tb3 = new DataTable("#fileUpload", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/getUploads',
        type: 'POST',
        dataFilter: function (data) {
            // console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "filename",
            render: function (data, type, row) {
                return `
                <span class="text-truncate">${data}</span>
                `;
            }
        },
        {
            "data": "date",
            render: function (data, type, row) {
                let date = new Date(data);
                let day = String(date.getDate()).padStart(2, '0');
                let month = String(date.getMonth() + 1).padStart(2, '0');
                let year = date.getFullYear();
                return `${day}.${month}.${year} `;
            }
        },
        {
            "data": "source",
            render: function (data, type, row) {
                return `
                <a href="${baseUrl}/uploads/${data}" class="blue">View</a>
                <a href="${baseUrl}/admin/deleteUploads?id=${data}" class="red">Delete</a>
                `;
            }
        }
    ]
})
let tb4 = new DataTable("#general_library", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/generalLibrary',
        type: 'POST',
        dataFilter: function (data) {
            console.log(JSON.parse(data));
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "filename",
            render: function (data, type, row) {
                return `
                <a target="_blank" href="${row.type == 'file' ? baseUrl + "/uploads/" + row.source : row.filename}" class="text-truncate blue">${data}</a>
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <a href="${baseUrl}/admin/fileRemove?section=general_library&id=${row.id}&type=${row.type == 'file' ? 'file' : 'link'}" class="red">Remove</a>
                `;
            }
        }
    ]
})
let tb5 = new DataTable("#classNotes", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/classNotes/'+t,
        type: 'POST',
        dataFilter: function (data) {
            // console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "filename",
            render: function (data, type, row) {
                return `
                ${data}
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <a target="_blank" href="${row.type == 'file' ? baseUrl + "/uploads/" + row.source : row.filename}"  class="blue">View</a>
                <a href="${baseUrl}/admin/fileRemove?section=${t}&id=${row.id}&type=${row.type == 'file' ? 'file' : 'link'}" class="red">Remove</a>
                `;
            }
        }
    ]
})
let tb6 = new DataTable("#timetable", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/timetable/'+t,
        type: 'POST',
        dataFilter: function (data) {
            // console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "filename",
            render: function (data, type, row) {
                return `
                ${data}
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <a target="_blank" href="${row.type == 'file' ? baseUrl + "/uploads/" + row.source : row.filename}"  class="blue">View</a>
                <a href="${baseUrl}/admin/fileRemove?section=${t}&id=${row.id}&type=timetable" class="red">Remove</a>
                `;
            }
        }
    ]
})
let tb7 = new DataTable("#test", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/test/'+t,
        type: 'POST',
        dataFilter: function (data) {
            // console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "name",
            render: function (data, type, row) {
                return `
                ${data}
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                ${row.status == 1? "Running":"Not Running"}
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <a href="${baseUrl}/admin/test_view?id=${row.id}&class=${t}"  class="blue">View</a>
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <a href="${baseUrl}/admin/start_op?type=start&id=${row.id}"  class="blue">Start</a>
                <a href="${baseUrl}/admin/start_op?type=end&id=${row.id}"  >End</a>
                <a href="${baseUrl}/admin/start_op?type=remove&id=${row.id}" class="red">Remove</a>
                `;
            }
        }
    ]
})
let tb8 = new DataTable("#test_maker", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/uploadedTests/',
        type: 'POST',
        dataFilter: function (data) {
            console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "name",
            render: function (data, type, row) {
                return `${data}`;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `${row.questions}`;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `${row.time}mins`;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <div class="btns">
                    <a href="${baseUrl}/admin/test_view_?id=${row.id}" class="blue">View</a>
                    <a href="${baseUrl}/admin/test_delete?id=${row.id}" class="red">Delete</a>
                  </div>`;
            }
        }
    ]
})
let tb9 = new DataTable("#test_scores", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/test_scores/',
        type: 'POST',
        dataFilter: function (data) {
            // console.log(data);
            // data = JSON.parse(data);
            //     // data.data = data.data.filter(g => g.balance && g.email && g.name);
            // return JSON.stringify(data);
            return data;
        }
    },
    columns: [
        {
            "data": "fullname",
            render: function (data, type, row) {
                return `${data}`;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `${row.score}%`;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                let date = new Date(row.date);
                let day = String(date.getDate()).padStart(2, '0');
                let month = String(date.getMonth() + 1).padStart(2, '0');
                let year = date.getFullYear();
                return `${day}.${month}.${year} `;
            }
        }
    ]
})
console.log(t);