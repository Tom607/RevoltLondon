new gridjs.Grid({
  columns: [
    {
      name: "Issue",
      width: "150px",
    },
    {
      name: "Category",
      width: "100px",
      attributes: (cell) => {
        // add these attributes to the td elements only
        if (cell === "Environmental") {
          return {
            "data-cell-content": cell,
            style: "color: #66FF70",
          };
        }
        if (cell === "Political") {
          return {
            "data-cell-content": cell,
            style: "color: #00738f",
          };
        }

        if (cell === "Social") {
          return {
            "data-cell-content": cell,
            style: "color: #ffb500",
          };
        }
        if (cell === "Technology") {
          return {
            "data-cell-content": cell,
            style: "color: #ff6394",
          };
        }
        if (cell === "Economic") {
          return {
            "data-cell-content": cell,
            style: "color: #e84033",
          };
        }
      },
    },
    { name: "Overall Rank" },
    { name: "Movement", sort: 0 },
    { name: "Overall Score" },
    { name: "US Rank" },
    { name: "UK Rank" },
    { name: "China Rank" },
    { name: "Brazil Rank" },
  ],
  data: [
    ["Unemployment and job security", "Economic", 1, "UP", 4804, 1, 4, 1, 1],
    ["Climate change", "Environmental", 2, "SAME", 3587, 19, 1, 4, 18],
    ["Access to healthcare", "Political", 3, "UP", 3409, 2, 3, 6, 2],
    ["Famine and food security", "Environmental", 4, "SAME", 3283, 6, 13, 2, 5],
    ["Access to quality education", "Economic", 5, "SAME", 3222, 7, 9, 8, 8],
    ["Extreme poverty around the world", "Political", 6, "DOWN", 3156, 9, 5, 25, 3],
    ["Mental health issues", "Social", 7, "UP", 3130, 10, 2, 17, 12],
    ["Government transparency and threats to democracy", "Political", 8, "UP", 3126, 3, 15, 16, 10],
    ["Access to water and sanitation around the world", "Political", 9, "DOWN", 3115, 4, 7, 9, 7],
    ["Crime, violence, gun control", "Political", 10, "DOWN", 3101, 15, 11, 13, 4],
    ["Global public health issues", "Political", 11, "UP", 3065, 12, 6, 7, 6],
    ["Poverty, hunger and homelessness in my country", "Political", 12, "SAME", 2854, 5, 14, 26, 9],
    ["Large scale conflict and wars", "Political", 13, "DOWN", 2817, 16, 24, 11, 13],
    ["Pollution of my local Environmental", "Environmental", 14, "DOWN", 2791, 25, 23, 3, 17],
    ["Care for the elderly", "Social", 15, "UP", 2757, 11, 10, 19, 16],
    ["The health of our oceans", "Environmental", 16, "DOWN", 2719, 22, 8, 14, 19],
    ["Fair wages", "Economic", 17, "DOWN", 2611, 18, 20, 23, 14],
    ["Recycling and waste", "Environmental", 18, "SAME", 2588, 27, 12, 20, 15],
    ["Cyber and data security", "Technology", 19, "DOWN", 2573, 17, 28, 12, 30],
    ["Natural disaster prevention and relief", "Environmental", 20, "DOWN", 2567, 23, 30, 10, 22],
    ["Unifying our country and communities", "Social", 21, "UP", 2566, 8, 36, 5, 47],
    ["Support for people with disabilities", "Social", 22, "SAME", 2539, 14, 17, 38, 20],
    ["Deforestation", "Environmental", 23, "SAME", 2503, 36, 19, 21, 11],
    ["Race relations and racism", "Social", 24, "UP", 2503, 13, 29, 39, 25],
    ["Equal opportunities in the workplace", "Economic", 25, "SAME", 2422, 21, 27, 29, 24],
    ["Income inequality", "Economic", 26, "SAME", 2387, 26, 31, 30, 21],
    ["Paying taxes fairly", "Economic", 27, "DOWN", 2355, 20, 33, 36, 28],
    ["Biodiversity and species extinction", "Environmental", 28, "SAME", 2342, 39, 26, 15, 23],
    ["Responsible spending and debt", "Economic", 29, "UP", 2264, 24, 34, 31, 36],
    ["Child labour", "Economic", 30, "DOWN", 2258, 29, 22, 40, 29],
    ["Addiction (drugs, alcohol and gambling)", "Political", 31, "DOWN", 2252, 31, 40, 24, 27],
    ["Support for public services", "Political", 32, "UP", 2249, 33, 16, 32, 42],
    ["Work-life balance", "Economic", 33, "DOWN", 2246, 30, 35, 27, 31],
    ["The plastic crisis", "Environmental", 34, "DOWN", 2173, 44, 18, 22, 35],
    ["Ethical business practices", "Economic", 35, "SAME", 2152, 28, 38, 28, 38],
    ["Obesity, access to healthy food and exercise", "Social", 36, "SAME", 2126, 34, 37, 34, 34],
    ["Decline of family relationships", "Social", 37, "DOWN", 2106, 32, 43, 35, 26],
    ["Universal access to technology and the internet", "Technology", 38, "SAME", 2039, 42, 39, 18, 41],
    ["Protecting vulnerable people online", "Technology", 39, "DOWN", 1989, 35, 32, 44, 43],
    ["Animal rights", "Environmental", 40, "SAME", 1954, 40, 25, 47, 32],
    ["Automation's impact on human employment", "Technology", 41, "SAME", 1879, 41, 45, 33, 33],
    ["Loneliness", "Social", 42, "UP", 1746, 46, 21, 48, 45],
    ["Gender inequality", "Social", 43, "DOWN", 1734, 43, 41, 43, 46],
    ["The refugee crisis", "Political", 44, "DOWN", 1704, 47, 42, 46, 37],
    ["Negative impact of technology (screen time, addiction etc)", "Technology", 45, "SAME", 1626, 48, 47, 41, 44],
    ["Self esteem and body image", "Social", 46, "DOWN", 1625, 45, 44, 37, 48],
    ["Fake news", "Technology", 47, "DOWN", 1606, 49, 46, 42, 39],
    ["Issues with our media", "Political", 48, "DOWN", 1518, 38, 49, 45, 49],
    ["Religious tolerance", "Social", 49, "SAME", 1477, 37, 48, 50, 40],
    ["LGBTQ+ rights", "Social", 50, "DOWN", 1024, 50, 50, 49, 50],
  ],
  search: {
    enabled: true,
  },
  sort: true,
  fixedHeader: true,
  height: "800px",
}).render(document.getElementById("report-2021-table"));
