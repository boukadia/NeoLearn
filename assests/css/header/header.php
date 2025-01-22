<style>

.headerr {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
            position: fixed;
            width: 83%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #3498db;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: #f5f6f7;
            border-radius: 20px;
            padding: 8px 15px;
            width: 300px;
        }

        .search-bar input {
            border: none;
            background: none;
            outline: none;
            width: 100%;
            padding: 5px;
        }

        .search-bar button {
            background: none;
            border: none;
            cursor: pointer;
            color: #666;
        }

        .auth-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .auth-btn {
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .login-btn {
            color: #3498db;
            border: 1px solid #3498db;
        }

        .login-btn:hover {
            background: #3498db;
            color: white;
        }

        .signup-btn {
            background: #3498db;
            color: white;
        }

        .signup-btn:hover {
            background: #2980b9;
        }

        .profile-section {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            position: relative;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ddd;
            overflow: hidden;
        }

        .profile-name {
            font-weight: 500;
        }

        .dropdown-icon {
            font-size: 20px;
            color: #666;
        }

        @media (max-width: 968px) {
            .search-bar {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-wrap: wrap;
                gap: 10px;
            }

            .search-bar {
                order: 3;
                width: 100%;
                margin-top: 10px;
            }

            .auth-section {
                gap: 10px;
            }

            .auth-btn {
                padding: 6px 15px;
            }
        }
    </style>