function renderDirectory(dir, query, type) {
    var listingDiv = $('#directoryListing');

    if(type === 'Students') type = 'Student';
    if(type === 'Organizations') type = 'Organization';
    if(type === 'FacultyandStaff') type = 'Faculty and Staff';

    // reset
    listingDiv.empty();

    dir.forEach(function (elem) {
        // Ignore element if not in search results
        if(query && !searchForOccurrences(elem, query)) { return; }

        // Ensure the filter is respected. Respect the filter!
        if(type === "Everyone" || elem.type === type) {
            console.log("HERE");

            var card = $('<div>').attr('class', 'directory-card');
            card.append($('<h4>').text(elem.name || (elem.fname + ' ' + elem.lname)));
            card.append($('<p>').text(elem.title || elem.class || elem.super));

            if(elem.type === "Organization") {
                var head = findPerson(dir, elem.head);
                card.append($('<p>').text("Head: " + ((head.fname + ' ' + head.lname) || head.rcs)));
                card.append($('<a>').attr('href', elem.homepage).text('View Homepage'));
            } else {
                card.append($('<p>').text(elem.department || elem.curriculum));
                card.append($('<a>').attr('href', elem.rcs + '@rpi.edu').text(elem.rcs + '@rpi.edu'));
            }

            listingDiv.append($('<div>').attr('class', 'col-md-3 col-sm-4').append(card));
        }
    })
}

function searchForOccurrences (elem, query) {
    var found = false;
    for(key in elem) {
        if(elem[key] && typeof elem[key] === 'string' && elem[key].toLowerCase().indexOf(query.toLowerCase())!=-1) {
            found = true;
            console.log('found')
        }
    }
    return found;
}

function findPerson(dir, rcs) {
    for(var i = 0; i < dir.length; i++) {
        if(dir[i].rcs === rcs) {
            return dir[i]
        }
    }
}

function setFilter(filter) {
    $('#filterBtn').html(filter + " ").append($('<span>').attr('class', 'caret'));
}

$(function() {
    // initial load
    renderDirectory(getDir(), "", "Everyone");

    // Executes search
    $('#searchBtn').click(function (event) {
        renderDirectory(getDir(), $("#searchField").val(), $('#filterBtn').text().replace(/\s/g, ''));
    })

    $('#searchField').keypress(function (e) {
        if (e.which == 13) {
            renderDirectory(getDir(), $("#searchField").val(), $('#filterBtn').text().replace(/\s/g, ''));
            return false;
        }
    });
});
