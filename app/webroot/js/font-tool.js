/*
 * @license
 *
 * MyFonts Webfont Trial
 *
 * You are only permitted use of these webfonts for testing purposes in non-production environments for 30 days. You can apply them in your css using:
 *
 * font-family: 'Marydale Regular'
 * font-family: 'Marydale Bold'
 *
 * © 2013 MyFonts Inc
 */
var browserName, browserVersion, webfontType;
var browsers = [{
    'regex': 'MSIE (\\d+\\.\\d+)',
    'versionRegex': 'new Number(RegExp.$1)',
    'type': [{
        "version": 9.0,
        "type": "woff"
    }, {
        "version": 5.0,
        "type": "eot"
    }]
}, {
    'regex': 'Trident\/(\\d+\\.\\d+); (.+)?rv:(\\d+\\.\\d+)',
    'versionRegex': 'new Number(RegExp.$3)',
    'type': [{
        "version": 11.0,
        "type": "woff"
    }]
}, {
    'regex': 'Firefox[\/\s](\\d+\\.\\d+)',
    'versionRegex': 'new Number(RegExp.$1)',
    'type': [{
        "version": 3.6,
        "type": "woff"
    }, {
        "version": 3.5,
        "type": "ttf"
    }]
}, {
    'regex': 'Chrome\/(\\d+\\.\\d+)',
    'versionRegex': 'new Number(RegExp.$1)',
    'type': [{
        "version": 6.0,
        "type": "woff"
    }, {
        "version": 4.0,
        "type": "ttf"
    }]
}, {
    'regex': 'Mozilla.*Android (\\d+\\.\\d+).*AppleWebKit.*Safari',
    'versionRegex': 'new Number(RegExp.$1)',
    'type': [{
        "version": 4.1,
        "type": "woff"
    }, {
        "version": 3.1,
        "type": "svg"
    }, {
        "version": 2.2,
        "type": "ttf"
    }]
}, {
    'regex': 'Mozilla.*(iPhone|iPad).* OS (\\d+)_(\\d+).* AppleWebKit.*Safari',
    'versionRegex': "new Number(RegExp.$2) + (new Number(RegExp.$3) / 10)",
    "unhinted": true,
    'type': [{
        "version": 5.0,
        "type": "woff"
    }, {
        "version": 4.2,
        "type": "ttf"
    }, {
        "version": 1.0,
        "type": "svg"
    }]
}, {
    'regex': 'Mozilla.*(iPhone|iPad|BlackBerry).*AppleWebKit.*Safari',
    'versionRegex': '1.0',
    'type': [{
        "version": 1.0,
        "type": "svg"
    }]
}, {
    'regex': 'Version\/(\\d+\\.\\d+)(\\.\\d+)? Safari\/(\\d+\\.\\d+)',
    'versionRegex': 'new Number(RegExp.$1)',
    'type': [{
        "version": 5.1,
        "type": "woff"
    }, {
        "version": 3.1,
        "type": "ttf"
    }]
}, {
    'regex': 'Opera\/(\\d+\\.\\d+)(\.+)Version\/(\\d+\\.\\d+)(\\.\\d+)?',
    'versionRegex': 'new Number(RegExp.$3)',
    'type': [{
        "version": 11.1,
        "type": "woff"
    }, {
        "version": 10.1,
        "type": "ttf"
    }]
}, ]
var browLen = browsers.length;
var unhinted = 0;
out: for (i = 0; i < browLen; i++) {
    var regex = new RegExp(browsers[i].regex);
    if (regex.test(navigator.userAgent)) {
        browserVersion = eval(browsers[i].versionRegex);
        var typeLen = browsers[i].type.length;
        for (j = 0; j < typeLen; j++) {
            if (browserVersion >= browsers[i].type[j].version) {
                if (browsers[i].unhinted == true) {
                    unhinted = 1;
                }
                webfontType = browsers[i].type[j].type;
                break out;
            }
        }
    } else {
        webfontType = 'woff';
    }
}
if (/(Macintosh|Android)/.test(navigator.userAgent) && webfontType != "svg") {
    unhinted = 1;
}
var fonts = [{
    "family": "Marydale Regular",
    "weight": "normal",
    "style": "normal",
    "urls": [{
        "woff": "DpFZOvR5UP9rh5sd21oegKURbF2pEIalYtn6So07g&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~RHBGWk92UjVVUDlyaDVzZDIxb2VnS1VSYkYycEVJYWxZdG42U28wN2ciLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=Hum9FvuaaJ1tvxQj8FKjsdr8XDxSyMXsTFB8VztCCK5o~xRUjw4mnbOB6~UsjPo6IOYeZIogxGTG-3ttD8mUjVAy4uec5EwLE6Gg-EuVR-gfhQhTz5io1EbgX38YwEbtdw2KuaK4OZfABGTgTBEst8aYXvg13q9cp2OVMTO~SqO-wCHJimmltFTxUcZxrBiPUun1aehSoRVy-AB1MLT2zlUai4m7JtaQtCsu7ONNZ1Fzv7bmPzNAQLDP-I6cgyrT2TBDchDXa8Vfh9JSl-4~vAf531KQ84d5LVxyAw2ly8kDJ8gofOTGAOo2-2Igw~lPtT7Oln7Hhlgf6RVaA6zRVQ__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "2H5cD31qO86W5TYX2BWpXelFW1vaVCSBdEibgSGR&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj8ySDVjRDMxcU84Nlc1VFlYMkJXcFhlbEZXMXZhVkNTQmRFaWJnU0dSIiwiQ29uZGl0aW9uIjp7IkRhdGVMZXNzVGhhbiI6eyJBV1M6RXBvY2hUaW1lIjoxMzg0MzAwODAwfX19XX0_&Signature=Bj4rXWzLUb~8pIRBDZ-RQ4XMXIMUnzzWz~c49lp0qtyUmLVd9hx3SbPembofXUDncVdCZMOVzLxO9OSaSQaHNnntiLkJBVSnnKLVeW9E8VlwCiyuuwyQIQATIkMtIrtGy8UTTGAA3HC6j5xTc0RkElrgUlxim7EwT9i3UAjMjhfmGU0tZNlTBMJPEbA5y9heOK~h~O781AKxuAnjeg-4MH7zyMO9ddGIUkHmQ1ALiLFZ3m1iK1-YgQcXMC6N2rXIUm1Lb38pn-cjz2gIEG9~rwQRTbprRtPoFU5fedYwtV7rx~htUM7gNoEbWztsmxyuJWnCvGJ5cOvqwTtPcvX4lg__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "4fpdZsmialpnosg8X4Ovf2cmWB7sTFOuVnLEHf0&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD80ZnBkWnNtaWFscG5vc2c4WDRPdmYyY21XQjdzVEZPdVZuTEVIZjAiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=MDJAeM8bobMpLAGndSNIOK1ICsET9~N7hmQgZKUv9QjBFMSVsZt4Wnlw17GFD0YAP2VYQcxaqLQ-fxcCCXLal7vvOJZB96wxFjfBt446iJibuLjpuF-PnqvjPoXImmhNSqDW8dI6T7RBisZUjv0HOD~UMUu8WJFY~o8iVtaXSjMpJxjK4vH1A7n-Cjp~v90qr2Irm2j6GvE9RFkQStQJ2qFjnhuNwFjfoEekVyeFto4B9SDirTzhLWlrY-PUuggDus3qjCLPk5SUUFhJ9Kdm1houkIxS0NepH~XH7a-i3DHJG5h1uNP-ggZJpy8aU1zE3FYYz1KtEIi3zhW3E85DLA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "PWDYNq3eYjkQuIP8fNevLM2Q8NYfYfvQ1bebr8b&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz9QV0RZTnEzZVlqa1F1SVA4Zk5ldkxNMlE4TllmWWZ2UTFiZWJyOGIiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=Gx0hjPt2~pTj13Bz3CjVtkMVYRmquNFKa2lyUecoDmieZhJ0VH5LG2I~3wp5K5Q4yvfzEGmV0fVoM4JUuXjnU6OHmxR75aSz5Tnzgl3t2TAMz8vvaP74YO7sgnoet2VymFsCoLXGlHIq~n0LYT4wnL5uji0Bg~WnCF~3wspJNbU1IuPSHkqTo8A-q~aqRiptySaPggbZeUBfLemBm2iTlYQ6HfvouQJV6l-BblFGANZX5pRS71wVwSXAiHy0tQNGbhD3XhrqMUG3ZV6ooho3n7vc-E-BT5SJ4rZ9jWJus~TghUCYDrdaSibUKup2M-7THmXYI1C3UCUwWQP-F~Jqxw__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }, {
        "woff": "562X4fG6ulXbACR6A6UMGTSQOiffR5Hu9eXFegSWP24k8WYVoVLDP8KMIlT&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~NTYyWDRmRzZ1bFhiQUNSNkE2VU1HVFNRT2lmZlI1SHU5ZVhGZWdTV1AyNGs4V1lWb1ZMRFA4S01JbFQiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=W3iXw2ElbMPOhedPa22bk1RwIhnJ-0E0z3aufp6btgUL-AvIqChRg0HDcyA8SpSBj9QL59K-YjOMRjjFmr6DOpbocg2ZhAUzITZnbiTwT~~h5dtsBg-~aOkoxT~yHaJiDTQHLvKQYMGUVPXbXGPecohCcUy1-uc-u-m61ylj1A3YfwPjNiRnhZARVc7v6wmjROhilDsgNQtrBBu-xu46malMbeCQ~O6CrNfj7Gl1CdnYiaIUlBvY6wUHbamvfGtinfoUVDRBT0dQvsA3NsIkBg~U5doc14h3jrlPLNe3yWv3zmKqwCP-jE-MxrNIJ0hWp8hKgVaUbxA47stLgTncaA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "ms0Uabp4JFVOJbf02hCkaev0aXHQruEqFILB9inrNDqE0H765kJdaSNJL&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj9tczBVYWJwNEpGVk9KYmYwMmhDa2FldjBhWEhRcnVFcUZJTEI5aW5yTkRxRTBINzY1a0pkYVNOSkwiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=ajI~ytZsPsFVr2CHbzo3lMJ7nmSKVtZ8Hk3geRXaiDQLzo7p3iK0t1wlNKiS9c0yN~DBjVvLIrpfaRPIQ~aOiOEN-2DS7MoVv7bvjYXl4SUwOBsxHDvo4NKyuKUx-vjW~T11ZCCOeCwTOtLOFmkFEzNloJgI46oAk80~dnKcj9BZ45vmU6pPoKUEq1ZW8N8dUTQi9QzAgPj5EBNi0e5-cVrHT~efoYuR1c~B44auhylXJC8~-DQ51pr5DYPAkaTlNt0jMpjDwrPOSukBs1eyWOgcvBvQvbG0D0RA0iz9qalsBoDhP-8MtpTj9nUtbd6uCG96yOmHpkh5GQ6mW1cDrA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "1ge6k6uIehEghIXo7aWmtl2T35WGee4h56eGiop2sGWfDEOsMDQSGOYWp&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD8xZ2U2azZ1SWVoRWdoSVhvN2FXbXRsMlQzNVdHZWU0aDU2ZUdpb3Ayc0dXZkRFT3NNRFFTR09ZV3AiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=T~-G7OoSjA9KR6AmH0dPf4YXLgKlqxq7a4pgTt0Rw7BxjFExHZDz7~liH-o1yf6ynUn1EfSwcRAcOC3kY1wIvEvcRCGCsLK3jPMl4xmDGR6SLfkqMpfN-MsH~OOoA39MNHaascgTbPuVYph80wswOW5Qa2gTrWPwiWMS5z0akNbyFc~WUFdayPw~dg4Hz1S-HBdll6NI1-bz0YIFMNkCkIls-sXm2BjOkmbYe6~9yxX3gtaRmP4puM5Csxh-7cCYlPVmvWmPKl9lIJT5-DTRHXMdSNHc3folo6Q-zZ6DqV8MkXznyQ7EZn3h0fYRxlnodn-QbfY9cxHBybId-RxKcA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "9MrK1131jZ0Q45XNk9pknuSOf4Wjrf68Ymu8RLiRe8iepDtd3rSI4oQBE&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz85TXJLMTEzMWpaMFE0NVhOazlwa251U09mNFdqcmY2OFltdThSTGlSZThpZXBEdGQzclNJNG9RQkUiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=eXA3L736g60DzYOnyxt-tDaw1rUkMYMTYAMLTMIyjzOFcG0Mh2-Jy1knpGc9~NtnxMu89cShWRL75d8ZLJgNbghxZYa0KioS2pfcDSQHqAb6LEfZ~peteQjP3KygMROqgFdRQqYH3LgY5D2nsNuvZdYZySrMqu5ZxZqSKopCmEr59NQd4n3y4eRrftgA9VloHKYHmEWXzL3Ce28pWSJnEAMgoaJ-envqIhKB5OhRnPL9hFTTCoxfIzp4oRWtF0G3WUMmgRkMRli-1yd5eeo-2hdJBJItq~W5X4FZvdrd6zxP41OgPh7TtBUlRzLz5AvYBs315Wpay8jUBvSKhOIDuQ__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }]
}, {
    "family": "Marydale Bold",
    "weight": "normal",
    "style": "normal",
    "urls": [{
        "woff": "DpFZOvR5UP9rh5sd21oenTrgl9rvZQcNVtb2ebh28&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~RHBGWk92UjVVUDlyaDVzZDIxb2VuVHJnbDlydlpRY05WdGIyZWJoMjgiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=nP1J6bL7lYAwOsftSDc5I5t5UjmPNuUjpemTT79Upd1XeMzVnz~CZzpBADrIFyL~M0NpQDWq03dBfRjqjcH3eNedivYzxtUvO8-6r6Fs~woppresZZ3abjI2VSrfawqq0k9jH16per0siYYFll6-3QGhAsNg7VMZ9vztL~~kH2HMto6-A9IZe7eETMUXkW5LKeLTNL-bP99slCr0PlDv5RBL3JOEte-LBeYLMAXpAHZA16qNpYXpypaWUDAioPcTuQDNk7E9rqbYBsb0UcEdWFfcj5vLybdi5pj5SHLN1ljTBxW8B~4vO2c6tA9nfurkoXl4KwoG9V7bUTp9pcrgrQ__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "2H5cD31qO86W5TYX2BX0h64PQr5vdE48d2enUDAp&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj8ySDVjRDMxcU84Nlc1VFlYMkJYMGg2NFBRcjV2ZEU0OGQyZW5VREFwIiwiQ29uZGl0aW9uIjp7IkRhdGVMZXNzVGhhbiI6eyJBV1M6RXBvY2hUaW1lIjoxMzg0MjE0NDAwfX19XX0_&Signature=nemj-Ha4ggxkGOvmM6gxFSLWdLTcgOkJQmdAK-El1vC-6u37uThQSsiV2tTEX0~eR5Iw1N59WI7UxP1SheMK2F7gA12Iwpc6d1bH8sGd4OBwXtSdYdLKe1nADGI6Zh3v4JI1TvOcSlM7qZ2dY~UfTnAKQJfzXSx~Gg7aqc8lvvKDw3CQ53671UchEMViFsHBqmgjKHYZ2v4d17HmQVhHy8kBqruZ647zMhrlFI3hnI244RpCEBGvyxmEN7fSFz650TxA6pBoeF-RNLj896zf45f7rXquXVDTGtn5eUaZDOQKO9cBgiynVcQi3YlgJSChGVL4slrns0o4umDYvNMmbQ__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "4fpdZsmialpnosg8X4HmHjSrd4ikRdRuhr9QWkY&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD80ZnBkWnNtaWFscG5vc2c4WDRIbUhqU3JkNGlrUmRSdWhyOVFXa1kiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=lI3bbQBgaRPQWH9XT4s9ptBel2s0dxKSkNDqQgiEBoiUAlibkN-dRwxgly8MhcDC2EjM6NojcGYZsbyOMOthum4ertk-XPBqKYIKu1Uaq8HnL5VYNWYu9tg3ptCf3Q2PoEvh1yaGz80hKZk-9q-R8ezCJ6Gu6hGfxPntdRJvhUjo0f3j-NAT8JkJ94gosbwooQ~Z6xj4ZhYFXBZpApoIEfQB36SOdSsGbkfN6fZAYBAzynYDkQIkDtDTRo~X6IHhi2S~0tYU9iLtUYEKK9IUSDI5aCoIr2MOvRlvB4iLrazgSFKNCfhkkaW0D5K7xk4PHQ82F4Qyr9xtPGQVS0YcvA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "PWDYNq3eYjkQuIP8fNXlu6oVFHDXX82QDfSoAED&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz9QV0RZTnEzZVlqa1F1SVA4Zk5YbHU2b1ZGSERYWDgyUURmU29BRUQiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=imbbOCPDTB1utl4vFFoCSxp5QP1Wcdr9rPONzCQN9cCeOJK17QGILBT1cs4CoK8Le7MFWeus~TkrwcMWcvrsD~~vDHqGESitzyNBjJJuhCFhz9hCQqqB57nwNraylTJo8wkIscpwKIuJ7UO7TpL7fMLg30HXmx6NbM7w7CYMOOKdZjSlfeF0l4aeUQgcWv7jUC8Sjn3DjxD-jkKkZN5NJ8IjwD8ot0rHcx4fy~2TwWcaglua990UdNuzqOD8of8QujTTVYbZBFnlyFJmo1~lAW8~SUusSn38HIaPDgyJ~qNrog4fM6KaS7P25yPsIatC0UtffxF93UmsXWXFVH3cOg__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }, {
        "woff": "562X4fG6ulXbACR6A6UMJ8BtVYTPJhs94v1k4nPRs6loRUZAsho7dErqgb1&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~NTYyWDRmRzZ1bFhiQUNSNkE2VU1KOEJ0VllUUEpoczk0djFrNG5QUnM2bG9SVVpBc2hvN2RFcnFnYjEiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=BpNItcnd7AfT9f-u1NkviRl1Ka0YBbWhwcv5uapa04RiOUXG3d4X4phEVfHxVTLHNkigkXPmNALQTq8HSq6TJhcnMX0X8m7cMqoxE9RkOCfDf9jgDySckIL9JKy37l~aMSHeJG6yoak3WJE3Io5leplAcOQhhJkzGLHrtJQjk9I74ZmC4GVm1LlkZ-Q-hnt0jKTux5KeZNEDpWzzz5SuF28coXnwKdpivNo68DC7xwQmhZM-oDIsovSu3wFOk2Gkrq9l308ySzsb~paBSP-QA8N0E16gM1NqzxkGfUGcGgY7ciAmR3PCg4q0Dbch2BI3h6DrULkD5frNwDC2I1QIuA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "ms0Uabp4JFVOJbf02hFPKC5mOHA7W9AAfmhI6eL08IDC0sBIYeXkC0l8p&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj9tczBVYWJwNEpGVk9KYmYwMmhGUEtDNW1PSEE3VzlBQWZtaEk2ZUwwOElEQzBzQklZZVhrQzBsOHAiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=CivFOBtqYyDGGYaEATst~f1Uw~GgyaQu~DZwIjEa5gDKEsnjnuTHFE0lyxCrldbzli4UK0vjIxJD-uIvWpolFb3lcVV47yVPcup8Kt7qoYIg~nmZ1wZOJ4D2rCslGafjq1AKs2u9g8SZ6kyJSc1tK4xfcROFyna7mZhrmLTSE3qhdcPs7ozwEGLwwq7iuVAsFF5prPvdKmZGqNRHYfq5DSedtvgnCvr1lDqI4KwBch9ejYW6ZgKn3n5bRQxgqYSz5tpYC3OviJzfI6N3L4czxOGODornPFF6fKsDEpsu8pYJMniWLceyJM1A1PmtXjZGsn9iEiebU2pqSYr5qltaMw__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "1ge6k6uIehEghIXo7aUCEHrdFLda4T9QaYI9ltLuBCDhCZKfpJCLeqAhL&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD8xZ2U2azZ1SWVoRWdoSVhvN2FVQ0VIcmRGTGRhNFQ5UWFZSTlsdEx1QkNEaENaS2ZwSkNMZXFBaEwiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=Qq~9EV-0P68g9k9w20VsOPR5slPJKqktO9WLyo1VjA9vUWDod-TjuSSawHfiT0wYKmbewDjbrV5~8YR6lz0cMCs4Wqu26KsxTWDnsK9ntF4ewF~kQ7-l~7CyIQ7OyvE9fzkt5oXDPHRzkoSO7Pc1GmoDbgrwEvliX7LHpqAygODVg~Ikzcab8z8IpTdE73nXY3KL~By4qePSd3Sz98YtuXWY1hUR6bG4koNdmzl~zBOvdKJUOJ2n-lAe7jWKFHCZoXB0OxABRXtp2dIz4WIPfWxGmh~GHUAfqBjsygHRz4Kyyu6CuDxnN8pKplbB0BZsLag3tixPXxJucmD7SWySUg__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "9MrK1131jZ0Q45XNk9nA8RLYrKe7HUAo8IY1UQFMt4PgoYpQX1EBTK2Lg&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz85TXJLMTEzMWpaMFE0NVhOazluQThSTFlyS2U3SFVBbzhJWTFVUUZNdDRQZ29ZcFFYMUVCVEsyTGciLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=DVvJ4XgPqsP58mFc2zeDYjHJI8m9jw~Kr8-RiJRNra3n90BfyiDKylA01n8m5~R6QkDqaTg8o63NysJtRSj2VUiTIg8D8wXaz578pWw51KrgW8pvV-atCUD2UoudiAoKiWAd~447i7lIxH7eUhP9pSdRqK1MOlSIn3k9t09K-l1PSPw0UG-Sn0VCkIajkAjsVZ5IZDN82FA6NbazhdIxGFBDb7O6gf4GLlCWZYgbt~5VQYUdU1qP39eBz2FCwA58FjrmoSHP5xBD2qEFyUKNs6CvKkRJLkZPVX78bk72YTfFBcrx0rBNtMhowMLJtOj8pRddfaLUTYvZEr~vwWQKsA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }]
}, {
    "family": "mfPreviewBar",
    "weight": "normal",
    "style": "normal",
    "urls": [{
        "woff": "UTs7f0VhM3ssgbRTsUJnBP4YnLtBdWYoXa6AZN8he5eqBEqEF&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~VVRzN2YwVmhNM3NzZ2JSVHNVSm5CUDRZbkx0QmRXWW9YYTZBWk44aGU1ZXFCRXFFRiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDMwMDgwMH19fV19&Signature=qjctUTeQvy45KkArBjpJtbisjDxftsVoU2Sbbw8G5Ug-Uv0jHoRfE2KTnrOx8drolBY~I1ZPMYcK1Zm7cjuFGLq-oHUKc4uNEqP2EgW1OVXvTHAjWSVig7EB2ZEsKJ8DM4dzrYES1ID5kJ6lPCGMdkKY~YCgAVDZ0mrZ6iUiYnHv49u36-1Xd9z9eJClOw-pAiXH7xliZPKKPynOiJNpfp-nhs5fRiUt9ih1tjEpdOP6hEF7-lMQ7me6l8XzESzvUevPUpyJ5HLpUzF1DZeltS60m7fYQTT7wcZOO7QEOlZUB5ptGZoGY8cnhrP57VJ15qQlvDzLYPOBe9JeVuttxg__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "52VKA6FAqrkfq3IccXB9uPu3ZhDqIt6fOonpfLddKZhcOB13&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj81MlZLQTZGQXFya2ZxM0ljY1hCOXVQdTNaaERxSXQ2Zk9vbnBmTGRkS1poY09CMTMiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQzMDA4MDB9fX1dfQ__&Signature=MUCyF90r0ko5lApp0cELSqOK1k~iyhe6qlZFnZcgYc0ePop1H3MrdIj5SPwSOfthnGY6dEcp9bcU1p1YHeLZFgi1zxOcFXKa0n46U8Mja-pRuljdeNlSobAwyTRbhJtthBc8cmHQqsBASwIbh3frVLQTLlhiS0iYSEB5wshypc7kI70DyMBfofE5yTB0CJnUyQwCG91CRv1RegLWv5tOPvD8jp4qxIv~oCSH1plV2QAz8NW76UOcs4lZfu89QlLZ8l4bUscyEFkQAzVKZmcTDFeZNVGph6kHB0-CKaUoVGnuh8-42TFVWX9K43Ys6QhHFl3Eh4SJhBNerVfn-glFWw__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "ALvjB6Hak0GSSseDY5HFONuFaX8E5idrjF1vWvdEUKo8Hjn&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD9BTHZqQjZIYWswR1NTc2VEWTVIRk9OdUZhWDhFNWlkcmpGMXZXdmRFVUtvOEhqbiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDMwMDgwMH19fV19&Signature=X6YPm4hoAuAmlOVAwssKll6pDNzzP1l88Ngm0XP2EXRWFtolE2JKssYxJuU1yAM8mgJn~bkXv41~QvTflhPly1fk~xp8GUbOu8Dga~rAXZadKFnKAYa66iBbWwJEAmkGUlajWtJWH-4xm5GLokFQDd5RzmOX9IRHFWTY15zCM4CpUsjGG6x~x5OBU-Ek~74sGPSfwvMW6gmljmVtiptzRTqocS2qwMwMwARo4Y8WpRysRx6k2qPA83OebegncJjSFN~FYTRfI31H-TQbgmSussZdHl0x9B2SpKthKVAY-WdvKH17Y4aIeVqa8bBMXcBkEIjRsVNoT6Wlxo4WXSzBHA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "u9o0gAcKH59d43mZZrj0GKF7VKo1sLeMeILJqO68iXa3BCA&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz91OW8wZ0FjS0g1OWQ0M21aWnJqMEdLRjdWS28xc0xlTWVJTEpxTzY4aVhhM0JDQSIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDMwMDgwMH19fV19&Signature=auS7QBUwlA8r1vlZlhQ4U0~ZCZIGcQYeDlLSge6rKP4zG9oDP4XXSQ45zU1cNaLEuHM-V8n1Ni2T7VuXF-OWY2vIMmTBleRwE2kKVEoS2FsKgdr5n27nQrU5CwNEUaY4faey1fNs79oB~JpJxGvXCphgSV0nii2K~CNR8MvazhYilkOz3xZXw-yuLcBS~TNBfgkfGzYalm6L1BX0kiFQGgnV61NFsFdAXQHKCZ-wZkL5uspFNeKucKHFxS-FEY~-LG6k6Kq9aPsi3YX4vr-AhASG6ThmSaIcBosa6mKa2fOAsohCbDuzF1UB8w8xXJs3-pjZaot7ruY89YnPLpYCAg__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }, {
        "woff": "3PdlVSHpd7Hb4L4qAoRMDakZi16M0RpmI3EP9tHSYPt4rZVf11lsK3v&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~M1BkbFZTSHBkN0hiNEw0cUFvUk1EYWtaaTE2TTBScG1JM0VQOXRIU1lQdDRyWlZmMTFsc0szdiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDMwMDgwMH19fV19&Signature=OL9sj6nSblEtl-VIFlGagAOmq9gmkis68HCGl9yJCVByUYDmo5BwfuneOAVuokDWCk3PZAkGp61KNBQ-ixEBzVJOQ5bSpIWGo3LhXg0cDjV4d21lKktBkBg09vIvxaRDlQV3OkzIE2RHAgOZj7QGe2z59kjP5sdRDwTMd4ou5CGZlS4GuL1W1eJJCn~UP4t1L-DjZ~XrZx8VSmBbmFOKWjFhXAWF59-PC7lE26OUrDp3ILtWF4ot5xdHD2FPV4hlqKIpBecUeiykXPc0fsljaaQz6OZpWx1eDHniGJojKu7AxQbk7TB8IaliCsdRISQtN42fkq0UgnSQuy5Aeekl-g__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "X0GJo9oGHflajUYPkIJXNRlsbvrhmD5vsNe6DNFKZ9tXa591g0QUb&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj9YMEdKbzlvR0hmbGFqVVlQa0lKWE5SbHNidnJobUQ1dnNOZTZETkZLWjl0WGE1OTFnMFFVYiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDMwMDgwMH19fV19&Signature=Wg3yFQ1wWNQHDtka4womcC7GIAPtE4M4l9djDJx5w5vP-ZDdGtB-Srv74Lmi4Xndg0tanBtznfHlRMUWiPHt10K41wIBtXlGr1ua3BejkStW1IBHEv6-hMgps0sF1dsUY5wCp~hqnbijS9WH~4D1XjqHCWVUfSxDPk-kDIeNAGhuPcf7vsvyIE2UtmSExPbcRIZ~tEte0cQjidEOuGAMsmMG4DQgGbrG5mgmzme446fC2gVw66mOtZwJcBLt-sLlg5JT13cnWup-RAPIwOuHTRnh5GaOqurBedkigf4sUWssM4UdO6CXanCn7HKwvUMkjCfuplOj~lc-fjOr28ryHA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "19rEVodLniAFrSEHafa7hUroAecjtAS5qUdgEkZrZcY2a5q11jg21&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD8xOXJFVm9kTG5pQUZyU0VIYWZhN2hVcm9BZWNqdEFTNXFVZGdFa1pyWmNZMmE1cTExamcyMSIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDMwMDgwMH19fV19&Signature=Cm3NXN3luwhRFibFVfApaHGBNaHPB9VqPhC8~hpElAnGEBAGH6lcDuK~JuswtbW7moS6l6DQRJY7cJm9QWLFvL9Mb-hP-tY3Z7gqC~SM4tOR6cdChc07oaD3nJfLTiVbIStEi6ckicEXgYognKAoVpmyOsuAbg9lsZnX-qf4MO0TZzXSVWJmRRJ2amACxi9KrZdlfyylUR4xD2b5VYRghjZYORKSKh~94I8RR31JHZDPxEatMgi~UUbVf9TOc3MkUremNyhT1yfvDJnrToeGB~7fgawO3yUNDHkvm~HU8pHtClaLrLxijkgTTy~yk2cqQdKkzNkI7ReeEIHzuyPJlQ__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "6JWHUkFerH0aNVCG4O4CtNW7JBbQqCE0JNGUebY9JEOeC68VHN7sC&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz82SldIVWtGZXJIMGFOVkNHNE80Q3ROVzdKQmJRcUNFMEpOR1VlYlk5SkVPZUM2OFZITjdzQyIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDMwMDgwMH19fV19&Signature=VPpOxTeh~YBj1o8RgiHCZ7SoRLGH2EfboTPz2RCpA1x57-h2l-QYqYvQ~1bF9z7kckcXkqcTFPMQotztN-tSZETFU3ZW9VHhzX35Da4WchPTig2EMGqMQCMrKEthRSjDOsK4DNwe87fAsFWenPs3-DJjRlHtMNqxZ2CGbi92vFqqU7ruxqXXkcT6tKuNiGHG8Xkn~3zx98rmMH3u7VwGM2c5pdnOD8oQVOhYkQ1nscJLy3E2qkXlEI2RCi0w4OEu-Po4Fc-ywEhRQ0sez5qG8MgWx49UeJHbtqLjVCPOLvGSQMuMCj8s063ny2aOaW-sfmaw~AYIoIjjNS0l7JjQuw__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }]
}, {
    "family": "mfPreviewClose",
    "weight": "normal",
    "style": "normal",
    "urls": [{
        "woff": "UTs7f0VhM3ssgTKiqrJKZnN8O8rniktRPCbXIWs8h1nCW3FKF&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~VVRzN2YwVmhNM3NzZ1RLaXFySktabk44TzhybmlrdFJQQ2JYSVdzOGgxbkNXM0ZLRiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDIxNDQwMH19fV19&Signature=ZPOgtQabZ4-t~A-CuDKg3bX6IwCZnBDAFokIJ8WrRJrPUgPu5hT0lb4Wv~4~-xILnX2FUjDl~JMBXJeJMb46tBlNDfKFK545Vbgg4BV4widyB4pWOF5QYwHKGTdYoDHE9xVzuFbfiXtEyavLG7LHMt1vg2ZKFPZpDMFm1QDiCRxeQlGJMqv89gEQ3vzyu8W~NwipZS2wI8KgMOgD6t1GHgTxm4NLP9-65HEFxtvWpaTqiP7QumY9VZ3qkocN9UIt5Kf15YhcpVrmoDgFWnqcneIkKjchPpnIkVTyGRVhmoprGA1c6O0lueDigqg6L8iyWGTNguxZrKJqGuSo4wYcQw__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "52VKA6FAqrkg1a0eYOSNh8VKaro5HY4Th9Dm516F3bHnrvYP&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj81MlZLQTZGQXFya2cxYTBlWU9TTmg4Vkthcm81SFk0VGg5RG01MTZGM2JIbnJ2WVAiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjEzODQyMTQ0MDB9fX1dfQ__&Signature=QNMwWlFf7V~HjcczyauqKj6xlXFDEhscpfVpRKUV6GLdiDVpHzagLghSqbysNucjNxvN2qFlXP7~jl-HiQzECJqS3ZfmAJ27GefiSrg7LHqW6pwzdn1bkRSf0H1OxnpA~4rc4otMFKHEFVC791yVQ7~teTtOkcFVQcxa-ZQP5QF6~afYki7R3rfL1dR6mqIkNWwzUsjpDuPDxLzldX4igbipO6ii-APoQNMBDgQ0GitMipYqmstiaNL6mEmmkpXPXlZcYPGn~kAfFPDpRZVOMey86-0kmZU61ZN~6k0Lunvdzm~CxTpBn6D~QKZ~s2BiVg6Nchb~sAgYG0vVsBUAPQ__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "ALvjB6Hak0G4eqb7G8q6Zr4OYfHRTRiD7ANsIeZBpM2oKjr&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD9BTHZqQjZIYWswRzRlcWI3RzhxNlpyNE9ZZkhSVFJpRDdBTnNJZVpCcE0yb0tqciIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDIxNDQwMH19fV19&Signature=Gciv0z8VOXrVozkZHaH9QrPL-~pwB3Z~w97ZSm9fRCnn2iT-HbD2S7T6pMOZsMd8O91y1TFN~KhDA-eHsniHGFLQbGdi5Cbzuf2YXYc6mQNT7ar0tWb9vFQHt2rcAlpXSMAt68JFg79T0KqEDQWQGVrfVsFBvnnoZ0~qKgrt2PY8~zfZOtvh1w8sNz0ywGc1C-qwH2lcTXXqpWBbU-tEymTXYS8GT4L1v9EUfhPghnDw7maU5M3XezdTknvdBkVmIAB9WXL2j25SwgZab9xYE9ALyek0IexpdLo~yhHA-DnaDn57wCNhKVKwIVhwVqFM4WMDYOgf2zdZO53y8mz7Nw__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "u9o0gAcKH5A4o7SUcAYKAMbauhppD21fpCbMXhsQB3CbEoo&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz91OW8wZ0FjS0g1QTRvN1NVY0FZS0FNYmF1aHBwRDIxZnBDYk1YaHNRQjNDYkVvbyIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDIxNDQwMH19fV19&Signature=LZuEL5Ck7R5xm~GWk6qttT6ydHtbrVASaeSO-Anqxz1eFVR~FwLn~RaiZv0mZ4YoLXgPDrMUKwE33RadJZbgovKp7w8xDtgUKvAEQSPfwiyJVhrXRS~KzdOh3uDkkTdQLTFYh8PKaOSyZ9a42kYsH1szwuLE48PMqYrmCZWwApnbmQmFYPuIQIfdlWVsmhUiE4m8gD8WNu2wxG2vH2SFZpI1hUzQ88lsloQrERH5R5Iqb9Fjjtnvqcq6Fy4LMadq-DlkRqsYNKK3s~Vj2R-RbTXE8OSFKMz25Zl-6kwx223km6DJ3wHxGH5tJJyf8mu41iq7eUDCa1sROEYyNXag3Q__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }, {
        "woff": "3PdlVSHpd7Hb4K9jlS00jWqjbS2a5815XXmPeaSL9YIPNQ6esQUYvfv&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3dvZmY~M1BkbFZTSHBkN0hiNEs5amxTMDBqV3FqYlMyYTU4MTVYWG1QZWFTTDlZSVBOUTZlc1FVWXZmdiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDIxNDQwMH19fV19&Signature=cXPICszjLKXMqZeQ5EgM-qDC3-p~LKuPtLuN1nJZcH-jqtXYuGt7Vg8tqi1yDFJMZ2pUHyxv7z81ukJhW7q0K9~a40B0LJmu5~cd5xCYd3wml12OEs9Y-GZsOnLHFLl5p--Iv8tqvNgA~D7SmoDhjlfmC4xdWYAHvfxPhYYXefSMqRsC7YWtEJCLEzjtWUa6OinkhJYObTlOu585ywKqBr0tzKwfgrGW~fCk7oTjEaIrcHukqq~zCTHZRgoSG98Y2~sab4UXkz9hh-vyhmUkyfsQ1K3FE0yiNcOzSn0-DTC1bwsYNkwFupp3IL4Kiu0d~44KvgrLC6psKaQCzIkhHQ__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "ttf": "X0GJo9oGHflbb1DDDrQY3ZQ7b0mDrgs5ogMmgOVkV9t9huILXc6if&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3R0Zj9YMEdKbzlvR0hmbGJiMURERHJRWTNaUTdiMG1EcmdzNW9nTW1nT1ZrVjl0OWh1SUxYYzZpZiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDIxNDQwMH19fV19&Signature=Vv74PCXNI2JteEMU0serzEgWLwDp9COMpf2A3UX8VAXxa8IVnUOB4EPoKGlj-Rc6R3bM2iZ~4uR9CO0L3-qWeQ~yShUr1vHAlQYNCOTh5GZ2BneJMkEU-BaNQSxSBd-3N1gK4r-9V3iBdB4Sdk0hCk6tPO-g6ykQ8mQK0IPjYB86iZkBe3akrKyXHs-8OKsPWx2lRC4JZMF3lULgMtw~Lj3JdQ8woila-L8C93ZIP7DCNV6iikH4-QThjell8kDHlyq-ZB7wPr9A0gx8qkrvACm5sztiPIrIb82yxoGiKH7BwoEmW~4naLjUa3liLs70FhZp5jABYTdb77G2sarzeA__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "eot": "19rEVodLniADDjjIiFY9hkrULgPPpVYMF2Y6IbW37JsCDY5aProZ7&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL2VvdD8xOXJFVm9kTG5pQUREampJaUZZOWhrclVMZ1BQcFZZTUYyWTZJYlczN0pzQ0RZNWFQcm9aNyIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDIxNDQwMH19fV19&Signature=WzpCnrjI2S0NbUy86mzEYD5YSKrpDvg0hTVvLbndJu~DxIuxQaBdByNcruTwImQRCedmH5PdYTiXF9X9bCF1ot2vgPuFaXgOm8ekqBU11dcx9segZBNCYU5vmhf2tvJlRcuu6nQkrabvQHdlZ~YHaHB9ofitfhGlLYcV5GIW2ZpxCUgCZw1VCZeG4lUdXVkUuroEG0nVOGjhVqQGZdVc9XzOUC~B1yxBmVIqKawz6CSORijEefuFKOLqbgybdnElN93--fcycB4iE~3xZNFlN6If6YQcosMsI-645Z1ce3VpCVi6gzsyebQvN1HvKsm~JQkedZEzzZ6Yaae5Ybx8Uw__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ",
        "svg": "6JWHUkFerH0d5DngDVmJa6hgTn8DArITXNIpYTVtWbsDRYqlu0Y7E&Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cCo6Ly8qL3YyL3N2Zz82SldIVWtGZXJIMGQ1RG5nRFZtSmE2aGdUbjhEQXJJVFhOSXBZVFZ0V2JzRFJZcWx1MFk3RSIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTM4NDIxNDQwMH19fV19&Signature=qj8dqqUQ6cpMRPlB1i5BA5C0HNO3~3Mvys0WuZLiwo9rtZ2TegXXHBH0Rc1078EGzfQflmdA3RZpKoT227gUArZ1R0CorSVZ0liMU4fLVw-U1LzTlL8wpPi7Z-L8lLCKdXDW8uosI1DpcGiSTkSxNiP~M3LqRDLq8X2S9lybrWtea7eN4CCzEEJl0-qFQ1MmzAyByFEL06HRWS9Q95QhMfN-HHr0Ndv1pA-o2~pFTKe5uckWqGeN5qPo8MLdz~0oYiytwWyc82X1L2ty28exBXU6HZvcXawZIHuhSY4dv~R3Qg-zTw8VaXanH8v3ddWIThzm-d30xYyJHqxrU-0G2Q__&Key-Pair-Id=APKAJN6QFZEE4BZCL6XQ"
    }]
}];
var len = fonts.length;
var css = "";
for (var i = 0; i < len; i++) {
    var suffix = "";
    if (webfontType == "svg") {
        var format = "format(\"svg\")";
        suffix = "#wf";
    } else if (webfontType == "ttf") {
        var format = "format(\"truetype\")";
    } else if (webfontType == "eot") {
        var format = "";
    } else {
        var format = "format(\"" + webfontType + "\")";
    }
    if (fonts[i].urls.length < 2) {
        unhinted = 0;
    }
    var protocol = document.location.protocol;
    if (protocol != "https:") {
        protocol = "http:";
    }
    css += "@font-face{font-family: '" + fonts[i].family + "';src:url('" + protocol + "//easy.myfonts.net/v2/" + webfontType + "?" + fonts[i]['urls'][unhinted][webfontType] + suffix + "')" + format + ";";
    if (fonts[i].fontWeight) {
        css += "font-weight: " + fonts[i].weight + ";";
    }
    if (fonts[i].fontStyle) {
        css += "font-style: " + fonts[i].style + ";";
    }
    css += "}";
}
var head = document.getElementsByTagName("head")[0];
var stylesheet = document.createElement("style");
stylesheet.setAttribute("type", "text/css");
stylesheet.innerHTML = css;
head.appendChild(stylesheet);