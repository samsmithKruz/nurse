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
                let t_ = document.querySelector('input[name="t_"]').value;
                console.log(t_);

                return `
                <div class="btns">
                ${(t_ == "2" ? `
                    <a href="${baseUrl}/admin/make_admin?id=${row.email}" onclick="confirmDelete(event)" class="blue">Make Admin</a>
                    `: ``)}
                  <a href="${baseUrl}/admin/student_overview?id=${row.email}">View</a>
                  <a href="${baseUrl}/admin/student_delete?id=${row.email}" onclick="confirmDelete(event)" class="red">Remove</a>
                </div>
                `;
            }
        }
    ]
})
let tb1__ = new DataTable("#staffs", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/getAllStaffs',
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
                  <a href="${baseUrl}/admin/staff_delete?id=${row.email}" onclick="confirmDelete(event)" class="red">Remove</a>
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
                  <a href="${baseUrl}/admin/student_delete?id=${row.email}" onclick="confirmDelete(event)" class="red">Remove</a>
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
                <a href="${baseUrl}/admin/deleteUploads?id=${data}" onclick="confirmDelete(event)" class="red">Delete</a>
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
                <a href="${baseUrl}/admin/fileRemove?section=general_library&id=${row.id}&type=${row.type == 'file' ? 'file' : 'link'}" onclick="confirmDelete(event)" class="red">Remove</a>
                `;
            }
        }
    ]
})
let tb4_ = new DataTable("#student_general_library", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/generalLibrary_',
        type: 'POST',
        dataFilter: function (data) {
            console.log(data);
            // console.log(JSON.parse(data));
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
                let date = new Date(row.date);
                let day = String(date.getDate()).padStart(2, '0');
                let month = String(date.getMonth() + 1).padStart(2, '0');
                let year = date.getFullYear();
                return `${day}.${month}.${year} `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                console.log(row);
                return `
                <a href="${row.type == 'link' ? row.filename : baseUrl + "/uploads/" + row.source}" >View</a>
                `;
            }
        }
    ]
})
let tb5 = new DataTable("#classNotes", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/classNotes/' + t,
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
                <a href="${baseUrl}/admin/fileRemove?section=${t}&id=${row.id}&type=${row.type == 'file' ? 'file' : 'link'}" onclick="confirmDelete(event)" class="red">Remove</a>
                `;
            }
        }
    ]
})
let tb5_ = new DataTable("#classNotes_", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/classNotes_/' + t,
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
                let date = new Date(row.date);
                let day = String(date.getDate()).padStart(2, '0');
                let month = String(date.getMonth() + 1).padStart(2, '0');
                let year = date.getFullYear();
                return `${day}.${month}.${year} `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                console.log(row);
                return `
                <a download="${row.filename}" href="${baseUrl + "/uploads/" + row.source}"  class="blue">Download</a>
                `;
            }
        }
    ]
})
let tb6 = new DataTable("#timetable", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/timetable/' + t,
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
                <a href="${baseUrl}/admin/fileRemove?section=${t}&id=${row.id}&type=timetable" onclick="confirmDelete(event)" class="red">Remove</a>
                `;
            }
        }
    ]
})
let tb7 = new DataTable("#test", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/test/' + t,
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
                ${row.status == 1 ? "Running" : "Not Running"}
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <a href="${baseUrl}/admin/test_view?id=${row.test_id}&class=${t}"  class="blue">View</a>
                `;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                return `
                <a href="${baseUrl}/admin/start_op?type=start&id=${row.id}" onclick="confirmDelete(event)" class="blue">Start</a>
                <a href="${baseUrl}/admin/start_op?type=end&id=${row.id}" onclick="confirmDelete(event)" >End</a>
                <a href="${baseUrl}/admin/start_op?type=remove&id=${row.id}" onclick="confirmDelete(event)" class="red">Remove</a>
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
                    <a href="${baseUrl}/admin/test_name?id=${row.id}" class="">Edit</a>
                    <a href="${baseUrl}/admin/test_delete?id=${row.id}" onclick="confirmDelete(event)" class="red">Delete</a>
                  </div>`;
            }
        }
    ]
})
let tb9 = new DataTable("#test_scores", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/test_scores?class=' + t,
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
        },
        {
            "data": null,
            render: function (data, type, row) {

                return `
                <div class="btns">
                  <a href="${baseUrl}/admin/test_watch?id=${row.test_id}&user_id=${row.user_id}" class="blue">View</a>
                </div>
                `;
            }
        }
    ]
})
let tb10 = new DataTable("#test_t", {
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + '/api/student_test/' + t,
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
                return `${row.score || "Not-submitted"}`;
            }
        },
        {
            "data": null,
            render: function (data, type, row) {
                if (row.score == null) {
                    return `<a href="${baseUrl}/student/test?id=${row.id}" onclick="confirmDelete(event)" class="">start test</a>`
                }
                return `<a href="${baseUrl}/student/watch_test?id=${row.id}" class="">View test</a>`
            }
        }
    ]
})