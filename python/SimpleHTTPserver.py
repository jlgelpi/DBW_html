import argparse
import http.server
import socketserver

ARGPARSER = argparse.ArgumentParser(
    description='Simple HTTP server'
)

ARGPARSER.add_argument(
    '-p',
    dest='PORT',
    help='Port (default 8080)',
    default=8080,
    type=int
    
)
args = ARGPARSER.parse_args()

Handler = http.server.SimpleHTTPRequestHandler


with socketserver.TCPServer(("", args.PORT), Handler) as httpd:
    print("serving at port", args.PORT)
    httpd.serve_forever()
