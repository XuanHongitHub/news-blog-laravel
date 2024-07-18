<?php
    $body['title'] = '404 Page';
?>
@extends('frontend.layouts.master')
@section('content')

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>4<span>0</span>4</h1>
        </div>
        <h2>không tìm thấy trang bạn yêu cầu</h2>
        <form action="{{ route('search.results') }}" method="GET" class="notfound-search">
            <input type="text" name="query" placeholder="Search..." required>
            <button type="Submit"><span></span></button>
        </form>
    </div>
</div>

@endsection

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
</script>

<style>
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu72xKOzY.woff2) format('woff2');
        unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }

    /* cyrillic */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu5mxKOzY.woff2) format('woff2');
        unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }

    /* greek-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7mxKOzY.woff2) format('woff2');
        unicode-range: U+1F00-1FFF;
    }

    /* greek */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4WxKOzY.woff2) format('woff2');
        unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF;
    }

    /* vietnamese */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7WxKOzY.woff2) format('woff2');
        unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
    }

    /* latin-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7GxKOzY.woff2) format('woff2');
        unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }

    /* latin */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxK.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    /* cyrillic-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfCRc4EsA.woff2) format('woff2');
        unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }

    /* cyrillic */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfABc4EsA.woff2) format('woff2');
        unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }

    /* greek-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfCBc4EsA.woff2) format('woff2');
        unicode-range: U+1F00-1FFF;
    }

    /* greek */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfBxc4EsA.woff2) format('woff2');
        unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF;
    }

    /* vietnamese */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfCxc4EsA.woff2) format('woff2');
        unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
    }

    /* latin-ext */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfChc4EsA.woff2) format('woff2');
        unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }

    /* latin */
    @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(/fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfBBc4.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
  background: #f6f6f6;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 767px;
  width: 100%;
  line-height: 1.4;
  padding: 110px 40px;
  text-align: center;
  background: #fff;
  -webkit-box-shadow: 0 15px 15px -10px rgba(0, 0, 0, 0.1);
          box-shadow: 0 15px 15px -10px rgba(0, 0, 0, 0.1);
}

.notfound .notfound-404 {
  position: relative;
  height: 180px;
}

.notfound .notfound-404 h1 {
  font-family: 'Roboto', sans-serif;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 165px;
  font-weight: 700;
  margin: 0px;
  color: #262626;
  text-transform: uppercase;
}

.notfound .notfound-404 h1>span {
  color: #00b7ff;
}

.notfound h2 {
  font-family: 'Roboto', sans-serif;
  font-size: 22px;
  font-weight: 400;
  text-transform: uppercase;
  color: #151515;
  margin-top: 0px;
  margin-bottom: 25px;
}

.notfound .notfound-search {
  position: relative;
  max-width: 320px;
  width: 100%;
  margin: auto;
}

.notfound .notfound-search>input {
  font-family: 'Roboto', sans-serif;
  width: 100%;
  height: 50px;
  padding: 3px 65px 3px 30px;
  color: #151515;
  font-size: 16px;
  background: transparent;
  border: 2px solid #c5c5c5;
  border-radius: 40px;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound .notfound-search>input:focus {
  border-color: #00b7ff;
}

.notfound .notfound-search>button {
  position: absolute;
  right: 15px;
  top: 5px;
  width: 40px;
  height: 40px;
  text-align: center;
  border: none;
  background: transparent;
  padding: 0;
  cursor: pointer;
}

.notfound .notfound-search>button>span {
  width: 15px;
  height: 15px;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%) rotate(-45deg);
      -ms-transform: translate(-50%, -50%) rotate(-45deg);
          transform: translate(-50%, -50%) rotate(-45deg);
  margin-left: -3px;
}

.notfound .notfound-search>button>span:after {
  position: absolute;
  content: '';
  width: 10px;
  height: 10px;
  left: 0px;
  top: 0px;
  border-radius: 50%;
  border: 4px solid #c5c5c5;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound-search>button>span:before {
  position: absolute;
  content: '';
  width: 4px;
  height: 10px;
  left: 7px;
  top: 17px;
  border-radius: 2px;
  background: #c5c5c5;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound .notfound-search>button:hover>span:after {
  border-color: #00b7ff;
}

.notfound .notfound-search>button:hover>span:before {
  background-color: #00b7ff;
}

@media only screen and (max-width: 767px) {
  .notfound h2 {
    font-size: 18px;
  }
}

@media only screen and (max-width: 480px) {
  .notfound .notfound-404 h1 {
    font-size: 141px;
  }
}

</style>