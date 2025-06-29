# Kubernetes and Cloud Native Associate (KCNA) Prep Online Test System

An online testing platform designed to help you prepare for the Kubernetes and Cloud Native Associate (KCNA) certification exam. This system provides a structured way to take practice tests and assess your Kubernetes and cloud native knowledge.

## Features

- Interactive multiple-choice question format
- Resource-based question sets
- Clean and user-friendly interface
- Immediate feedback on answers
- Simple submission process

## Project Structure

```
kcna-prep/
├── index.php         # Main application entry point
├── resources/        # Directory containing question resources
├── scripts/          # Client-side JavaScript files
│   └── main.js       # Main application script
└── styles/           # CSS stylesheets
    └── main.css      # Main stylesheet
```

## Getting Started

1. Clone the repository
2. Ensure PHP is installed on your system
3. Serve the project using PHP's built-in server:
   ```bash
   php -S localhost:8000
   ```
   (You can replace 8000 with any available port number)
4. Access the application through your web browser at http://localhost:8000

## Usage

1. Open the application in your web browser
2. Navigate through different resources using the `resource_num` parameter (1-6):
   - `http://localhost:8000/?resource_num=1` for Resource 1
   - `http://localhost:8000/?resource_num=2` for Resource 2
   - And so on up to Resource 6
3. Answer the multiple-choice questions
4. Click the Reset button to clear your answers and start over
5. Click on "Reveal Answer" to reveal the correct answer and explanation for each question

## Technical Details

- Built with PHP
- Uses CSV files for storing question resources
- Client-side JavaScript for interactive UI elements
- Responsive design for better user experience

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please open an issue in the GitHub repository or contact the maintainers directly.
