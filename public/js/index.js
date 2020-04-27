function generateRN(len, add) {	 // 可均衡获取0+add到len+add的随机整数。
    return parseInt(Math.floor(Math.random() * len) + add);
}

function draw() { // 抽取宿舍和动作
    var value = "";
    var str = "<tr><th>号码</th><th>宿舍号</th><th>动作号</th></tr>";
    male_dorm = ['中2#103', '中2#104', '中2#105', '中2#106', '中2#107', '中2#108', '中2#109', '中2#110', '中2#111', '中2#112', '中2#113', '中2#114',
        '中2#115', '中2#116', '中2#117', '中2#118', '中2#119', '中2#120', '中2#121', '中2#122', '中2#123', '中2#201', '中2#202', '中2#203',
        '中2#204', '中2#205', '中2#206', '中2#207', '中2#208', '中2#209', '中2#210', '中2#213', '中2#214', '中2#215', '中2#216', '中2#217',
        '中2#218', '中2#219', '中2#220', '中2#221', '中2#222', '中2#223', '中2#224', '中2#225', '中2#301', '中2#302', '中2#303', '中2#304',
        '中2#305', '中2#306', '中2#307', '中2#308', '中2#309', '中2#310', '中2#313', '中2#314', '中2#325', '中2#411'];
    female_dorm = ['东2#410', '东2#411', '东2#412', '东2#413', '东2#414', '东2#415', '东2#416', '东2#417',
        '东2#418', '东2#419', '东2#421', '东2#422', '东2#423', '东2#424', '东2#425', '东2#426'];
    var maleNum = male_dorm.length;
    var femaleNum = female_dorm.length;
    var existMD = new Array();	// 判断宿舍号是否存在
    var existFD = new Array();
    var existMV = new Array();
    for (var i = 0; i < 4; ++i) {
        do {
            dorm = generateRN(maleNum, 0); // 0-male_dorm.length-1
        } while (existMD[dorm] == 1); // 如果宿舍已存在，则重新选一间
        existMD[dorm] = 1;  // 被抽到的宿舍标记为1

        do {
            move = generateRN(10, 1);  // 1-10
        } while (existMV[move] == 1);
        existMV[move] = 1;

        value += male_dorm[dorm] + "_" + move + "_";
        str += "<tr><td>" + (i + 1) + "</td><td>" + male_dorm[dorm] + "</td><td>" + move + "</td></tr>";
    }

    for (var i = 4; i < 6; ++i) {
        do {
            dorm = generateRN(femaleNum, 0); // 0-female_dorm.length-1
        } while (existFD[dorm] == 1);
        existFD[dorm] = 1;

        do {
            move = generateRN(10, 1);  // 1-10
        } while (existMV[move] == 1);
        existMV[move] = 1;

        value += female_dorm[dorm] + "_" + move + "_";
        str += "<tr><td>" + (i + 1) + "</td><td>" + female_dorm[dorm] + "</td><td>" + move + "</td></tr>";
    }
    document.getElementById("hiddenText").value = value;
    document.getElementById("tbl").innerHTML = str;
}