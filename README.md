# Site Time Location

The **Site Time Location** module displays the site location and the current time based on the configured timezone. The time updates every second on the screen.

## Requirements

- Drupal 8 or 9

## Installation

1. **Download the module**: Place the `site_time_location` module in the `modules/custom` directory of your Drupal installation.

2. **Enable the module**:
   ```sh
   drush en site_time_location
   ```
   Or enable it through the Drupal admin UI by navigating to **Extend** and enabling the **Site Time Location** module.

## Configuration

1. **Navigate to Configuration Form**: Go to `Admin -> Configuration -> System -> Site Time Location Settings` or directly access `/admin/config/system/site-time-location-settings`.

2. **Set Location and Timezone**:
    - **Country**: Enter the country name.
    - **City**: Enter the city name.
    - **Timezone**: Select the appropriate timezone from the dropdown list.

3. **Save Configuration**.

## Usage

1. **Add Time Location Block**:
    - Go to `Admin -> Structure -> Block Layout`.
    - Click on **Place block** in the region where you want to display the block.
    - Search for **Time Location Block** and click **Place block**.
    - Configure the block settings as needed and click **Save block**.

2. **View the Block**:
    - The block will display the configured country, city, and the current time based on the selected timezone.
    - The time will update every second dynamically.

## License

This project is licensed under the MIT License.
EOF
