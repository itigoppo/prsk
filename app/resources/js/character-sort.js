import {loadMembers} from './front'

let members = [];
const sortMembers = [];
const parent = [];
let totalSize, nrec, cmp1, cmp2;
const rec = [];
const equal = [];
let head1 = 0;
let head2 = 0;
let numQuestion = 1;
let finishSize = 0;
let isFinish = false;

$(function () {
    $.when(loadMembers()).then(function () {
        let data = arguments[0];
        members = data.data;
    }).then(function () {
        init();
        showBattle();
        showDefault();

        $('#reset').on('click', function () {
            init();
            showBattle();
            showDefault();
        });
        $('#left-field').on('click', function () {
            if (!isFinish) {
                calc(-1);
            }
        });
        $('#right-field').on('click', function () {
            if (!isFinish) {
                calc(1);
            }
        });
        $('#middle-field').on('click', function () {
            if (!isFinish) {
                calc(0);
            }
        });
    });
});

const init = () => {
    let cnt1 = 0;
    sortMembers[cnt1] = [];
    for (let cnt2 = 0; cnt2 < members.length; cnt2++) {
        sortMembers[cnt1][cnt2] = cnt2;
    }
    parent[cnt1] = -1;
    totalSize = 0;
    cnt1++;

    for (let cnt2 = 0; cnt2 < sortMembers.length; cnt2++) {
        if (sortMembers[cnt2].length >= 2) {
            const mid = Math.ceil(sortMembers[cnt2].length / 2);
            sortMembers[cnt1] = [];
            sortMembers[cnt1] = sortMembers[cnt2].slice(0, mid);
            totalSize += sortMembers[cnt1].length;
            parent[cnt1] = cnt2;
            cnt1++;
            sortMembers[cnt1] = [];
            sortMembers[cnt1] = sortMembers[cnt2].slice(mid, sortMembers[cnt2].length);
            totalSize += sortMembers[cnt1].length;
            parent[cnt1] = cnt2;
            cnt1++;
        }
    }

    for (let cnt2 = 0; cnt2 < members.length; cnt2++) {
        rec[cnt2] = 0;
    }
    nrec = 0;

    for (let cnt2 = 0; cnt2 < members.length; cnt2++) {
        equal[cnt2] = -1;
    }

    cmp1 = sortMembers.length - 2;
    cmp2 = sortMembers.length - 1;
}

const showProgress = () => {
    const rate = Math.floor(finishSize * 100 / totalSize);
    const progress = $('#result-progress');
    $('#battle-number').html('Battle No.' + numQuestion + ' ## ' + rate + '% sorted.');
    progress.css('width', rate + '%');
    progress.prop('aria-valuenow', rate);
}

const showBattle = () => {
    showProgress();

    $('#left-field').html(showIcon(sortMembers[cmp1][head1]));
    $("#right-field").html(showIcon(sortMembers[cmp2][head2]));

    numQuestion++;
}

const showIcon = (id) => {
    const member = members[id];

    return '<div class="card-body text-center">'
        + '<img src="'+ member.icon_url + '" class="card-img-top w-50">'
        + '<p class="card-text mt-3">'
        + '<i class="fa-solid fa-globe" style="color: '+ member.unit.bg_color +'"></i> '
        + member.name + ' (' + member.unit.name + ')'
        + '</p>'
        + '</div>';
}

const showDefault = () => {
    let showMember = '';
    for (let [key, value] of Object.entries(members)) {
        showMember += "<div class=\"col-md-3 col-sm-6 my-1\"><div class=\"card\">" + showIcon(key) + "</div></div>";
    }

    const resultField = $('#result-field');
    resultField.html('<hr />チェック対象メンバー' + members.length + '人<br />');
    resultField.append('<div class="row">' + showMember + '</div>');
}

const showResult = () => {
    showProgress();

    let result = '<table id="result" class="table table-sm table-striped">'
        + '<thead>'
        + '<tr><th>順位</th><th>名前</th></tr>'
        + '</thead>'
        + '<tbody>'
        + '</tbody>'
        + '</table>';
    $('#result-field').html(result);

    let ranking = 1;
    let sameRank = 1;
    for (let cnt1 = 0; cnt1 < members.length; cnt1++) {
        $('#result').append('<tr><td>' + ranking + '</td><td>'
            + '<i class="fa-solid fa-globe" style="color: '+ members[sortMembers[0][cnt1]].unit.bg_color +'"></i>'
            + members[sortMembers[0][cnt1]].name + ' (' + members[sortMembers[0][cnt1]].unit.name + ')'
            + '</td></tr>');
        if (cnt1 < members.length - 1) {
            if (equal[sortMembers[0][cnt1]] === sortMembers[0][cnt1 + 1]) {
                sameRank++;
            } else {
                ranking += sameRank;
                sameRank = 1;
            }
        }
    }
}

const calc = (index) => {
    if (index < 0) {
        rec[nrec] = sortMembers[cmp1][head1];
        head1++;
        nrec++;
        finishSize++;
        while (equal[rec[nrec - 1]] !== -1) {
            rec[nrec] = sortMembers[cmp1][head1];
            head1++;
            nrec++;
            finishSize++;
        }
    } else if (index > 0) {
        rec[nrec] = sortMembers[cmp2][head2];
        head2++;
        nrec++;
        finishSize++;
        while (equal[rec[nrec - 1]] !== -1) {
            rec[nrec] = sortMembers[cmp2][head2];
            head2++;
            nrec++;
            finishSize++;
        }
    } else {
        rec[nrec] = sortMembers[cmp1][head1];
        head1++;
        nrec++;
        finishSize++;
        while (equal[rec[nrec - 1]] !== -1) {
            rec[nrec] = sortMembers[cmp1][head1];
            head1++;
            nrec++;
            finishSize++;
        }
        equal[rec[nrec - 1]] = sortMembers[cmp2][head2];
        rec[nrec] = sortMembers[cmp2][head2];
        head2++;
        nrec++;
        finishSize++;
        while (equal[rec[nrec - 1]] !== -1) {
            rec[nrec] = sortMembers[cmp2][head2];
            head2++;
            nrec++;
            finishSize++;
        }
    }

    if (head1 < sortMembers[cmp1].length && head2 === sortMembers[cmp2].length) {
        while (head1 < sortMembers[cmp1].length) {
            rec[nrec] = sortMembers[cmp1][head1];
            head1++;
            nrec++;
            finishSize++;
        }
    } else if (head1 === sortMembers[cmp1].length && head2 < sortMembers[cmp2].length) {
        while (head2 < sortMembers[cmp2].length) {
            rec[nrec] = sortMembers[cmp2][head2];
            head2++;
            nrec++;
            finishSize++;
        }
    }

    if (head1 === sortMembers[cmp1].length && head2 === sortMembers[cmp2].length) {
        for (let cnt1 = 0; cnt1 < sortMembers[cmp1].length + sortMembers[cmp2].length; cnt1++) {
            sortMembers[parent[cmp1]][cnt1] = rec[cnt1];
        }
        sortMembers.pop();
        sortMembers.pop();
        cmp1 = cmp1 - 2;
        cmp2 = cmp2 - 2;
        head1 = 0;
        head2 = 0;

        if (head1 === 0 && head2 === 0) {
            for (let cnt1 = 0; cnt1 < members.length; cnt1++) {
                rec[cnt1] = 0;
            }
            nrec = 0;
        }
    }

    if (cmp1 < 0) {
        showResult();
        isFinish = true;
    } else {
        showBattle();
    }
}
