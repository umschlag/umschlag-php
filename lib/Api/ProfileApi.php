<?php
/**
 * ProfileApi
 * PHP version 5
 *
 * @category Class
 * @package  Umschlag
 * @author   Thomas Boerger <thomas@webhippie.de>
 * @license  http://www.apache.org/licenses/LICENSE-2.0.html Apache-2.0
 * @link     https://github.com/umschlag/umschlag-php
 */

/**
 * Umschlag OpenAPI
 *
 * API definition for Umschlag
 *
 * The version of the OpenAPI document: 1.0.0-alpha1
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.0.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Umschlag\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Umschlag\ApiException;
use Umschlag\Configuration;
use Umschlag\HeaderSelector;
use Umschlag\ObjectSerializer;

/**
 * ProfileApi Class Doc Comment
 *
 * @category Class
 * @package  Umschlag
 * @author   Thomas Boerger <thomas@webhippie.de>
 * @license  http://www.apache.org/licenses/LICENSE-2.0.html Apache-2.0
 * @link     https://github.com/umschlag/umschlag-php
 */
class ProfileApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $host_index (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $host_index = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $host_index;
    }

    /**
     * Set the host index
     *
     * @param  int Host index (required)
     */
    public function setHostIndex($host_index)
    {
        $this->hostIndex = $host_index;
    }

    /**
     * Get the host index
     *
     * @return Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation showProfile
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \Umschlag\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Umschlag\Model\Profile|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError
     */
    public function showProfile()
    {
        list($response) = $this->showProfileWithHttpInfo();
        return $response;
    }

    /**
     * Operation showProfileWithHttpInfo
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \Umschlag\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Umschlag\Model\Profile|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError, HTTP status code, HTTP response headers (array of strings)
     */
    public function showProfileWithHttpInfo()
    {
        $request = $this->showProfileRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\Umschlag\Model\Profile' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\Profile', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Umschlag\Model\Profile';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\Profile',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation showProfileAsync
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function showProfileAsync()
    {
        return $this->showProfileAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation showProfileAsyncWithHttpInfo
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function showProfileAsyncWithHttpInfo()
    {
        $returnType = '\Umschlag\Model\Profile';
        $request = $this->showProfileRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'showProfile'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function showProfileRequest()
    {

        $resourcePath = '/profile/self';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation tokenProfile
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \Umschlag\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Umschlag\Model\AuthToken|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError
     */
    public function tokenProfile()
    {
        list($response) = $this->tokenProfileWithHttpInfo();
        return $response;
    }

    /**
     * Operation tokenProfileWithHttpInfo
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \Umschlag\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Umschlag\Model\AuthToken|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError, HTTP status code, HTTP response headers (array of strings)
     */
    public function tokenProfileWithHttpInfo()
    {
        $request = $this->tokenProfileRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\Umschlag\Model\AuthToken' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\AuthToken', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Umschlag\Model\AuthToken';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\AuthToken',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation tokenProfileAsync
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function tokenProfileAsync()
    {
        return $this->tokenProfileAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation tokenProfileAsyncWithHttpInfo
     *
     * Retrieve an unlimited auth token
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function tokenProfileAsyncWithHttpInfo()
    {
        $returnType = '\Umschlag\Model\AuthToken';
        $request = $this->tokenProfileRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'tokenProfile'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function tokenProfileRequest()
    {

        $resourcePath = '/profile/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateProfile
     *
     * Retrieve an unlimited auth token
     *
     * @param  \Umschlag\Model\Profile $profile The profile data to update (required)
     *
     * @throws \Umschlag\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Umschlag\Model\Profile|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError|\Umschlag\Model\ValidationError|\Umschlag\Model\GeneralError
     */
    public function updateProfile($profile)
    {
        list($response) = $this->updateProfileWithHttpInfo($profile);
        return $response;
    }

    /**
     * Operation updateProfileWithHttpInfo
     *
     * Retrieve an unlimited auth token
     *
     * @param  \Umschlag\Model\Profile $profile The profile data to update (required)
     *
     * @throws \Umschlag\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Umschlag\Model\Profile|\Umschlag\Model\GeneralError|\Umschlag\Model\GeneralError|\Umschlag\Model\ValidationError|\Umschlag\Model\GeneralError, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateProfileWithHttpInfo($profile)
    {
        $request = $this->updateProfileRequest($profile);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\Umschlag\Model\Profile' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\Profile', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 412:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\Umschlag\Model\ValidationError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\ValidationError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\Umschlag\Model\GeneralError' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Umschlag\Model\GeneralError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Umschlag\Model\Profile';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\Profile',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 412:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\ValidationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Umschlag\Model\GeneralError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateProfileAsync
     *
     * Retrieve an unlimited auth token
     *
     * @param  \Umschlag\Model\Profile $profile The profile data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateProfileAsync($profile)
    {
        return $this->updateProfileAsyncWithHttpInfo($profile)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateProfileAsyncWithHttpInfo
     *
     * Retrieve an unlimited auth token
     *
     * @param  \Umschlag\Model\Profile $profile The profile data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateProfileAsyncWithHttpInfo($profile)
    {
        $returnType = '\Umschlag\Model\Profile';
        $request = $this->updateProfileRequest($profile);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateProfile'
     *
     * @param  \Umschlag\Model\Profile $profile The profile data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateProfileRequest($profile)
    {
        // verify the required parameter 'profile' is set
        if ($profile === null || (is_array($profile) && count($profile) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $profile when calling updateProfile'
            );
        }

        $resourcePath = '/profile/self';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($profile)) {
            $_tempBody = $profile;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
